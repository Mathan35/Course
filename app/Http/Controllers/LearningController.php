<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Course;
use App\Models\Learning;
use App\Http\Requests\LearningRequest;

class LearningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $learning = QueryBuilder::for(Learning::class)->orderBy('id', 'desc')->get();
        return view('admin.learning.view-learning', compact('learning'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course   = QueryBuilder::for(Course::class)->get();
        $learning = QueryBuilder::for(Learning::class)->get();
        return view('admin.learning.learning', compact('course','learning'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LearningRequest $request)
    {
        $learning               = new Learning;
        $learning->course_id    = $request->course_id;
        $learning->name         = $request->name;
        $learning->save();
        return redirect()->back()->with('success', 'Learning successfully stored');
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
        $course   = QueryBuilder::for(Course::class)->get();
        $learning = QueryBuilder::for(Learning::class)->find($id);
        return view('admin.learning.edit-learning', compact('learning','course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LearningRequest $request, $id)
    {
        $learning               =  Learning::find($id);
        $learning->course_id    = $request->course_id;
        $learning->name         = $request->name;
        $learning->save();
        return redirect()->back()->with('success', 'Learning successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Learning::find($id)->delete();
        return redirect()->back()->with('success', 'Learning successfully Deleted');
    }
}
