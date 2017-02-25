<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Role;
use App\User;
use Validator;

class UserController extends Controller
{
    /**
     * Create a new user controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        $data = array('users' => $user);

        return view('users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        $data = array('user' => $user);

        return view('users.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        $roles = Role::all();

        $coordinators = Role::findOrFail( trans('globals.coordinator') )->users;

        $data = array(
            'user' => $user,
            'roles' => $roles,
            'coordinators' => $coordinators
        );

        return view('users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this->validator($request->except(['email']));

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->second_name = $request->second_name;
        $user->password = $request->password;
        $user->role_id = $request->role;
        $user->user_id = $request->coordinator;

        $user->update();

        return self::redirection('users/' . $id . '/edit', trans('user.edit.success'), trans('user.index.title'), url('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return self::redirection('users', trans('user.destroy.success'), null, null);
    }

    /**
     * Get a validator for an incoming store/update request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'second_name' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
            'role' => 'required',
            'coordinator' => 'required_if:role,3'
        ]);
    }

}
