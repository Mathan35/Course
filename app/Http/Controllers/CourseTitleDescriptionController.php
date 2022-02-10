<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\CourseTitleDetail;
use App\Models\CourseTitle;
use App\Http\Requests\CourseTitleDetailRequest;
class CourseTitleDescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseTitleDetail   = QueryBuilder::for(CourseTitleDetail::class)->get();
        return view('admin.course-title-detail.view-course-title-detail', compact( 'courseTitleDetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $courseTitle         = QueryBuilder::for(CourseTitle::class)->get();
        $courseTitleDetail   = QueryBuilder::for(CourseTitleDetail::class)->get();
        return view('admin.course-title-detail.course-title-detail', compact('courseTitle', 'courseTitleDetail'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseTitleDetailRequest $request)
    {
        $courseTitleDetail                    = new CourseTitleDetail;
        $courseTitleDetail->course_title_id   = $request->course_title_id;
        $courseTitleDetail->description       = $request->description;
        $courseTitleDetail->save();
        return redirect()->back()->with('success', 'Course Title Description successfully stored');
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
        $courseTitle       = QueryBuilder::for(CourseTitle::class)->get();
        $courseTitleDetail = QueryBuilder::for(CourseTitleDetail::class)->find($id);
        return view('admin.course-title-detail.edit-course-title-detail', compact('courseTitle', 'courseTitleDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseTitleDetailRequest $request, $id)
    {
        $courseTitleDetail                    = CourseTitleDetail::find($id);
        $courseTitleDetail->course_title_id   = $request->course_title_id;
        $courseTitleDetail->description       = $request->description;
        $courseTitleDetail->save();
        return redirect()->back()->with('success', 'Course Title Description successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CourseTitleDetail::find($id)->delete();
        return redirect()->back()->with('success', 'Course Title Description successfully Deleted');
    }
}
