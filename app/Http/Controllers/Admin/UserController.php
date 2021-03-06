<?php

namespace Teedlee\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Teedlee\Http\Requests;
use Teedlee\Http\Controllers\Controller;
use Teedlee\User;
use Teedlee\Http\Requests\UpdateUser;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index')
            ->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new \Teedlee\User();
        $user->user_group_id = 5;
        return $this->edit($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateUser $request)
    {
        $request = $request->except('_token');
        $user = \Teedlee\User::findOrNew($request['id']);

        if( $request['id'] )
        {
            if( isset($request['password']) )
            {
                $request['password'] = \Hash::make($request['password']);
            } else {
                $request['password'] = $user->password;
            }

            $user->update($request);

        } else {
            if (isset($request['password'])) {
                $request['password'] = \Hash::make($request['password']);
            } else {
                $request['password'] = \Hash::make('12345678');
            }

            $user->create($request);
        }

        return redirect('admin/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        return view('admin.user.edit')
            ->with('user_groups', \Teedlee\Models\UserGroup::all()->pluck('name', 'id'))
            ->with('cities', \Teedlee\Models\City::all()->pluck('name', 'id'))
            ->with('provinces', \Teedlee\Models\Province::all()->pluck('name', 'id'))
            ->with('user', $user);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
