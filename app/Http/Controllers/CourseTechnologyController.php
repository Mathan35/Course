<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Technology;
use App\Models\CourseTechnology;
use App\Models\Course;
use App\Http\Requests\CourseTechnologyRequest;
class CourseTechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getCourse         = QueryBuilder::for(CourseTechnology::class)->get()->pluck('course_id');
        $checkedCourse     = QueryBuilder::for(Course::class)->whereIn('id',$getCourse)->get();
        return view('admin.course-technology.view-course-technology', compact('checkedCourse'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course            = QueryBuilder::for(Course::class)->get();
        $technology        = QueryBuilder::for(Technology::class)->get();
        return view('admin.course-technology.course-technology', compact('course','technology'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseTechnologyRequest $request)
    {
        $course     = Course::find($request->course_id);
        $technology = $request->technology_id;
        $course->Technology()->attach($technology);
        return redirect()->back()->with('success', 'Course Technology successfully stored');
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
        $course            = QueryBuilder::for(Course::class)->get();
        $getCourse         = QueryBuilder::for(Course::class)->find($id);
        $technology        = QueryBuilder::for(Technology::class)->get();
        $checkedTechnology = collect($getCourse->technology)->pluck('id')->toArray();
        return view('admin.course-technology.edit-course-technology', compact('checkedTechnology','course','getCourse','technology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseTechnologyRequest $request, $id)
    {
        $course     = Course::find($request->course_id);
        $technology = $request->technology_id;
        $course->Technology()->sync($technology);
        return redirect()->back()->with('success', 'Course Technology successfully Updated');
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
