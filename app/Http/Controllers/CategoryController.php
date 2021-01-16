<?php

namespace App\Http\Controllers;

use App\Category;
use App\Dish;
use App\Http\Requests\CategoryFormRequest;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use function response;

class CategoryController extends Controller {

    public function __construct() {
        $this->middleware( 'auth' )->except( [
            'display',
            'show',
        ] );
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index( Request $request ) {
        $orderby = $request->has( 'orderby' ) ? $request->get( 'orderby' ) : 'sort';
        $dir = $request->has( 'dir' ) ? $request->get( 'dir' ) : 'asc';

        $id = $request->has( 'id' ) ? $request->get( 'id' ) : null;
        $title = $request->has( 'title' ) ? $request->get( 'title' ) : null;
        $sort = $request->has( 'slug' ) ? $request->get( 'sort' ) : null;
        $live = $request->has( 'live' ) ? $request->get( 'live' ) : null;
        $dish_id = $request->has( 'dish_id' ) ? $request->get( 'dish_id' ) : null;

        $categories = Category::when( in_array( $orderby, [ 'id', 'sort', 'title', 'live' ] ), function ( $query ) use ( $orderby, $dir ) {
            return $query->orderby( 'categories.' . $orderby, $dir );

            /* === FILTER ========================================= */

        } )->when( !empty( $id ), function ( $query ) use ( $id ) {
            return $query->where( 'categories.id', $id );

        } )->when( !empty( $title ), function ( $query ) use ( $title ) {
            return $query->where( 'categories.title', 'LIKE', '%' . $title . '%' );

        } )->when( !empty( $dish_id ) && $dish_id != 'any', function ( $query ) use ( $dish_id ) {
            return $query->join( 'categorizables', function ( $join ) {
                $join->on( 'categorizables.category_id', '=', 'categories.id' )
                    ->where( 'categorizables.categorizable_type', 'App\Dish' );
            } )->where( 'categorizables.categorizable_id', $dish_id );

        } )->when( !empty( $live ) && $live != 'any', function ( $query ) use ( $live ) {
            return $query->when( $live == 'yes', function ( $query ) {
                return $query->where( 'categories.live', 1 );
            } )->when( $live == 'no', function ( $query ) {
                return $query->where( 'categories.live', 0 );
            } );

        } )->select( 'categories.*' )
            ->paginate( 20 )
            ->appends( $request->input() );

        return view( 'admin.category.index', [
            'models'  => $categories,
            'class'   => 'category',
            'orderby' => $orderby,
            'filter'  => [
                'id'      => $id,
                'title'   => $title,
                'live'    => $live,
                'dish_id' => $dish_id
            ],
            'dir'     => $dir
        ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return view( 'admin.create', [ 'class' => 'category' ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryFormRequest $request
     * @return Response
     */
    public function store( CategoryFormRequest $request ) {
        $category = Category::createCategory( $request );
        return redirect( route( 'admin.category.index', [ 'category' => $category ] ) );
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function show( Category $category ) {
        return redirect( route( 'category.display', [ 'slug' => $category->slug, 'class' => 'category' ] ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function edit( Category $category ) {
        return view( 'admin.edit', [ 'model' => $category, 'class' => 'category' ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryFormRequest $request
     * @param Category $category
     * @return Response
     */
    public function update( CategoryFormRequest $request, Category $category ) {
        $category->updateCategory( $request );
        return redirect( route( 'admin.category.index' ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     * @throws Exception
     */
    public function destroy( Category $category ) {
        $category->delete();
        return response( "" )->header( 'X-IC-Remove', '1s' );
    }

    public function display( $slug ) {
        $category = Category::where( 'slug', $slug )->first();
        if( !empty( $category ) ) {
            return view( 'category', [ 'category' => $category ] );
        }
        return view( '404' );
    }

    /**
     * @param Category $category
     * @param Dish $dish
     * @return Application|Factory|View
     */
    public function dishMoveUp( Category $category, Dish $dish ) {
        $category->dishMoveUp( $dish );
        return view( 'admin.category.dishes', [ 'category' => $category ] );
    }

    /**
     * @param Category $category
     * @param Dish $dish
     * @return Application|Factory|View
     */
    public function dishMoveDown( Category $category, Dish $dish ) {
        $category->dishMoveDown( $dish );
        return view( 'admin.category.dishes', [ 'category' => $category ] );
    }

    /**
     * @param Category $category
     * @return Application|Factory|View
     */
    public function toggleLive( Category $category ) {
        $category->live = !$category->live;
        $category->save();
        return view( 'inc.boolean', [
            'value'    => $category->live,
            'icPostTo' => route( 'admin.category.toggle-live', [ 'category' => $category ] )
        ] );
    }
}
