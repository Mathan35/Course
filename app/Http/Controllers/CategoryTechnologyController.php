<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Course;
use App\Models\Category;
use App\Http\Requests\CategoryCourseRequest;

class CategoryTechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category   = QueryBuilder::for(Category::class)->get();
        return view('admin.category-course.view-category-course', compact('category'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course  = QueryBuilder::for(Course::class)->get();   
        return view('admin.category-course.create-category-course', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCourseRequest $request)
    {
        $category       = new Category;
        $category->name = $request->name;
        $category->save();

        $course = $request->course_id;
        $category->Course()->attach($course);
        return redirect()->back()->with('success', 'Category Courses successfully stored');
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
        $category          = QueryBuilder::for(Category::class)->find($id);
        $course            = QueryBuilder::for(Course::class)->get();
        $checkedCourse = collect($category->course)->pluck('id')->toArray();
        return view('admin.category-course.edit-category-course', compact('course','category','checkedCourse'));

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
        $category       = Category::find($id);
        $category->name = $request->name;
        $category->save();

        $course = $request->course_id;
        $category->Course()->sync($course);
        return redirect()->back()->with('success', 'Category Courses successfully updated');
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
