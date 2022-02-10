<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Technology;
use App\Models\CourseTechnology;
use App\Http\Requests\TechnologyRequest;
use App\Helpers\Validate;

class TechnologyController extends Controller
{
    use Validate;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technology = QueryBuilder::for(Technology::class)->get();
        return view('admin.technology.view-technology', compact('technology'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.technology.technology');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TechnologyRequest $request)
    {
        $technology              = new Technology;
        $image                   = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('assets/images/'),$image);
        $technology->name        = $request->name;
        $technology->image       = $image;
        $technology->description = $request->description;
        $technology->save();
        return redirect()->back()->with('success', 'Technology successfully stored');
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
        $technology = QueryBuilder::for(Technology::class)->find($id);
        return view('admin.technology.edit-technology', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TechnologyRequest $request, $id)
    {
        $technology              =  Technology::find($id);
        $image                   = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('assets/images/'),$image);
        $technology->name        = $request->name;
        $technology->image       = $image;
        $technology->description = $request->description;
        $technology->save();
        return redirect()->back()->with('success', 'Technology successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         return $this->ValidateTechnology($id);

    }
}
