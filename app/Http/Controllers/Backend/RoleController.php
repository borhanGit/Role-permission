<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function index()
    {

        $roles= Role::all();
        return view('backend.pages.role.index',[
            'roles'=>$roles
        ]);
    }


    public function create()
    {
        $permissions= Permission::all();
        return view('backend.pages.role.create',[
            'permissions'=>$permissions
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:roles'
    ],
            [
                'name.required'=>'Please give a role name'
        ]);
       $role =  Role::create(['name' => $request->name]);
       $permissions = $request->input('permissions');
       if (!empty($permissions))
       {
           $role->syncPermissions($permissions);
       }
       return back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
