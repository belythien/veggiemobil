<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Http\Requests\DishFormRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use function response;

class DishController extends Controller {

    public function __construct() {
        // Middleware only applied to these methods
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

        $orderby = $request->has( 'orderby' ) ? $request->get( 'orderby' ) : 'title';
        $dir = $request->has( 'dir' ) ? $request->get( 'dir' ) : 'asc';

        $id = $request->has( 'id' ) ? $request->get( 'id' ) : null;
        $slug = $request->has( 'slug' ) ? $request->get( 'slug' ) : null;
        $title = $request->has( 'title' ) ? $request->get( 'title' ) : null;
        $live = $request->has( 'live' ) ? $request->get( 'live' ) : null;
        $category_id = $request->has( 'category_id' ) ? $request->get( 'category_id' ) : null;

        $dishes = Dish::when( in_array( $orderby, [ 'id', 'slug', 'title', 'live' ] ), function ( $query ) use ( $orderby, $dir ) {
            return $query->orderby( 'dishes.' . $orderby, $dir );

        } )->when( $orderby == 'categories', function ( $query ) use ( $orderby, $dir ) {
            return $query->join( 'categorizables', function ( $join ) {
                $join->on( 'categorizables.categorizable_id', '=', 'dishes.id' )
                    ->where( 'categorizables.categorizable_type', 'App\Dish' );
            } )->join( 'categories', 'categories.id', '=', 'categorizables.category_id' )
                ->orderby( 'categories.sort', $dir )
                ->orderby( 'categories.title', $dir )
                ->orderby( 'dishes.title', $dir );

            /* === FILTER ========================================= */

        } )->when( !empty( $id ), function ( $query ) use ( $id ) {
            return $query->where( 'dishes.id', $id );

        } )->when( !empty( $slug ), function ( $query ) use ( $slug ) {
            return $query->where( 'dishes.slug', 'LIKE', '%' . $slug . '%' );

        } )->when( !empty( $title ), function ( $query ) use ( $title ) {
            return $query->where( 'dishes.title', 'LIKE', '%' . $title . '%' );

        } )->when( !empty( $category_id ) && $category_id != 'any', function ( $query ) use ( $category_id ) {
            return $query->join( 'categorizables', function ( $join ) {
                $join->on( 'categorizables.categorizable_id', '=', 'dishes.id' )
                    ->where( 'categorizables.categorizable_type', 'App\Dish' );
            } )->where( 'categorizables.category_id', $category_id );

        } )->when( !empty( $live ) && $live != 'any', function ( $query ) use ( $live ) {
            return $query->when( $live == 'yes', function ( $query ) {
                return $query->where( 'dishes.live', 1 );
            } )->when( $live == 'no', function ( $query ) {
                return $query->where( 'dishes.live', 0 );
            } );

        } )->select( 'dishes.*' )
            ->paginate( 20 )
            ->appends( $request->input() );

        return view( 'admin.dish.index', [
            'models'  => $dishes,
            'class'   => 'dish',
            'orderby' => $orderby,
            'filter'  => [
                'id'          => $id,
                'slug'        => $slug,
                'title'       => $title,
                'live'        => $live,
                'category_id' => $category_id
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
        return view( 'admin.create', [ 'class' => 'dish' ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store( DishFormRequest $request ) {
        $dish = Dish::createDish( $request );
        return redirect( route( 'admin.dish.index', [ 'dish' => $dish ] ) );
    }

    /**
     * Display the specified resource.
     *
     * @param Dish $dish
     * @return Response
     */
    public function show( Dish $dish ) {
//        return view( 'dish', [ 'dish' => $dish, 'class' => 'dish' ] );
        return redirect( route( 'dish.display', [ 'slug' => $dish->slug, 'class' => 'dish' ] ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Dish $dish
     * @return Response
     */
    public function edit( Dish $dish ) {
        return view( 'admin.edit', [ 'model' => $dish, 'class' => 'dish' ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Dish $dish
     * @return Response
     */
    public function update( DishFormRequest $request, Dish $dish ) {
        $dish->updateDish( $request );
        return redirect( route( 'admin.dish.index' ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Dish $dish
     * @return Response
     */
    public function destroy( Dish $dish ) {
        $dish->delete();
        return response( "" )->header( 'X-IC-Remove', '1s' );
    }

    /**
     * @param $slug
     * @return Application|Factory|View
     */
    public function display( $slug ) {
        $dish = Dish::where( 'slug', $slug )->first();
        if( !empty( $dish ) ) {
            return view( 'dish', [ 'dish' => $dish ] );
        }
        return view( '404' );
    }

    /**
     * @param Dish $dish
     * @return Application|Factory|View
     */
    public function toggleLive( Dish $dish ) {
        $dish->live = !$dish->live;
        $dish->save();
        return view( 'inc.boolean', [
            'value'    => $dish->live,
            'icPostTo' => route( 'admin.dish.toggle-live', [ 'dish' => $dish ] )
        ] );
    }
}
