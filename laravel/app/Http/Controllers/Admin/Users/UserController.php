<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\Role;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = new User;

        $query = $this->search($query, $request);

        $query = $query->sortable(['id', 'desc']);

        $users = $query->paginate(15);

        return view('user.index')->with(compact('users'));
    }

    public function search($query, $request)
    {
        if ($request->has('name')) {
            if (!empty($request->name)) {
                $query = $query->where('name', 'LIKE', "%{$request->name}%");
            }
        }

        if ($request->has('username')) {
            if (!empty($request->username)) {
                $query = $query->where('username', 'LIKE', "%{$request->username}%");
            }
        }

        if ($request->has('email')) {
            if (!empty($request->email)) {
                $query = $query->where('name', 'LIKE', "%{$request->email}%");
            }
        }

        if ($request->has('status')) {
            if ($request->status >= 0) {
                $query = $query->where('status', (int)$request->status);
            }
        }

        return $query;
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
        $roles = Role::where('id', '>', 1)->orderBy('name', 'asc')->get();
        return view('user.edit')->with(compact('user', 'roles'));
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
        $user = User::findOrFail($id);

        $rules = [
            'role' => 'required'
        ];

        $request->validate($rules);

        $roles = explode(',', $request->role);

        $user->syncRoles($roles);

        Session::flash('success', 'User role is changed successfully!');
        return redirect()->route('users.index');
    }

}