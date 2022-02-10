<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Course;
use App\Models\CourseTitle;
use App\Models\CourseTitleDetail;
use App\Http\Requests\CourseTitleRequest;
use App\Helpers\Validate;

class CourseTitleController extends Controller
{
    use Validate;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseTitle   = QueryBuilder::for(CourseTitle::class)->get();
        return view('admin.course-title.view-course-title', compact('courseTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course   = QueryBuilder::for(Course::class)->get();
        $courseTitle   = QueryBuilder::for(CourseTitle::class)->get();
        return view('admin.course-title.course-title', compact('course', 'courseTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseTitleRequest $request)
    {
        $courseTitle              = new CourseTitle;
        $courseTitle->course_id   = $request->course_id;
        $courseTitle->title       = $request->title;
        $courseTitle->save();
        return redirect()->back()->with('success', 'Course Title successfully stored');
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
        $course      = QueryBuilder::for(Course::class)->get();
        $courseTitle = QueryBuilder::for(CourseTitle::class)->find($id);
        return view('admin.course-title.edit-course-title', compact('course', 'courseTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseTitleRequest $request, $id)
    {
        $courseTitle              = CourseTitle::find($id);
        $courseTitle->course_id   = $request->course_id;
        $courseTitle->title       = $request->title;
        $courseTitle->save();
        return redirect()->back()->with('success', 'Course Title successfully Deleted');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       return $this->ValidateCourseTechnology($id);
     
    }
}
