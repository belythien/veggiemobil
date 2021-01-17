<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller {

    public function __construct() {
        // Middleware only applied to these methods
        $this->middleware( 'auth' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $users = User::paginate( 20 );
        return view( 'admin.user.index', [ 'models' => $users, 'class' => 'user' ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return view( 'admin.create', [ 'class' => 'user' ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserFormRequest $request
     * @return Response
     */
    public function store( UserFormRequest $request ) {
        User::createUser( $request );
        return redirect( route( 'admin.user.index') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function edit( User $user ) {
        return view( 'admin.edit', [ 'model' => $user, 'class' => 'user' ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserFormRequest $request
     * @param User $user
     * @return Response
     */
    public function update( UserFormRequest $request, User $user ) {
        $user->updateUser( $request );
        return redirect( route( 'admin.user.index' ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     */
    public function destroy( User $user ) {
        $user->delete();
        return response( "" )->header( 'X-IC-Remove', '1s' );
    }
}
