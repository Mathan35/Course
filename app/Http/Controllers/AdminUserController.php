<?php

namespace App\Http\Controllers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user  = QueryBuilder::for(User::class)->where('role','!=','0')->get();   
        return view('admin.admin-user.view-admin-user', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role  = QueryBuilder::for(Role::class)->get();   
        return view('admin.admin-user.create-admin-user', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user           = new User;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->role     = $request->role;
        $user->status   = 1;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('success', 'user created successfully with role');
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
        $user  = QueryBuilder::for(User::class)->find($id);   
        $role  = QueryBuilder::for(Role::class)->get();   
        return view('admin.admin-user.edit-admin-user', compact('role','user'));
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
        $user           = User::find($id);
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->role     = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('success', 'user updated successfully with role');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();
        return redirect()->back()->with('success', 'user deleted successfully');


    }
}
