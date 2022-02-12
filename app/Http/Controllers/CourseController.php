<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Course;
use App\Models\CourseTitle;
use App\Models\CourseTechnology;
use App\Models\Learning;
use App\Http\Requests\CourseRequest;
use App\Helpers\Validate;

class CourseController extends Controller
{

    use Validate;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = QueryBuilder::for(Course::class)->orderBy('id', 'desc')->get();
        return view('admin.course.view-course', compact('course'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.course');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $course                       = new Course;
        $image                        = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('assets/images/'),$image);
        $course->name                 = $request->name;
        $course->price                = $request->price;
        $course->actual_price         = $request->actual_price;
        $course->offer_percentange    = $request->offer_percentange;
        $course->course_level         = $request->course_level;
        $course->course_duration      = $request->course_duration;
        $course->class_type           = $request->class_type;
        $course->language             = $request->language;
        $course->video_url            = $request->video_url;
        $course->image                = $image;
        $course->short_description    = $request->short_description;
        $course->detailed_description = $request->detailed_description;
        $course->save();
        return redirect()->back()->with('success', 'Course successfully stored');
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
        $course = QueryBuilder::for(Course::class)->find($id);
        return view('admin.course.edit-course', compact('course'));
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
        $course                       =  Course::find($id);
        if($request->hasFile('image')) {
            $image                        = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('assets/images/'),$image);
            $course->image                = $image;
        }
        
        $course->name                 = $request->name;
        $course->price                = $request->price;
        $course->actual_price         = $request->actual_price;
        $course->offer_percentange    = $request->offer_percentange;
        $course->course_level         = $request->course_level;
        $course->course_duration      = $request->course_duration;
        $course->class_type           = $request->class_type;
        $course->language             = $request->language;
        $course->video_url            = $request->video_url;
        $course->short_description    = $request->short_description;
        $course->detailed_description = $request->detailed_description;
        $course->save();
        return redirect()->back()->with('success', 'Course successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->ValidateCourse($id);
    }
}
