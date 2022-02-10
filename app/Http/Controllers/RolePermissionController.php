<?php

namespace App\Http\Controllers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\PermissionGroup;
use App\Models\Role;
use App\Http\Requests\RolePermissionRequest;
class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role   = QueryBuilder::for(Role::class)->get();
        return view('admin.role-permission.view-role-permission', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissionGroup   = QueryBuilder::for(PermissionGroup::class)->get();
        return view('admin.role-permission.create-role-permission', compact('permissionGroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolePermissionRequest $request)
    {
        $role       = new Role;
        $role->name = $request->role;
        $role->save();

        $permission = $request->permission_id;
        $role->permissions()->attach($permission);
        return redirect()->back()->with('success', 'Role Permission successfully stored');
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
    public function edit($id)
    {  
        $role              = QueryBuilder::for(Role::class)->find($id);
        $permissionGroup   = QueryBuilder::for(PermissionGroup::class)->get();
        $checkedPermission = collect($role->permissions)->pluck('id')->toArray();
        return view('admin.role-permission.edit-role-permission', compact('role','permissionGroup','checkedPermission'));

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
        $role       = Role::find($id);
        $role->name = $request->role;
        $role->save();

        $permission = $request->permission_id;
        $role->permissions()->sync($permission);
        return redirect()->back()->with('success', 'Role Permission successfully updated');
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
