<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Course;
use App\Models\Country;
use App\Models\Degree;
use App\Models\College;
use App\Models\Specializtion;
use App\Models\UserUgDegree;
use App\Models\UserPgDegree;
use App\Http\Requests\EducationRequest;

class UgDegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EducationRequest $request)
    {
        $degree          = new Degree;
        $degree->name    = $request->degree;
        if($request->file('degree_image')){
        $degreeImage     = $request->file('degree_image')->getClientOriginalName();
        $request->file('degree_image')->move(public_path('assets/images/'),$degreeImage);
        $degree->image   = $degreeImage;
        }
        $degree->save();

        $specializtion        = new Specializtion;
        $specializtion->name  = $request->specializtion;
        if($request->file('specialization_image')){
        $specializtionImage   = $request->file('specialization_image')->getClientOriginalName();
        $request->file('specialization_image')->move(public_path('assets/images/'),$specializtionImage);
        $specializtion->image = $specializtionImage;
        }
        $specializtion->save();


        $college           = new College;
        $college->name     = $request->college;
        $college->location = $request->location;
        if($request->file('college_image')){
        $collegeImage      = $request->file('college_image')->getClientOriginalName();
        $request->file('college_image')->move(public_path('assets/images/'),$collegeImage);
        $college->image    = $collegeImage;
        }
        $college->save();

        $ugDegree                   = new UserUgDegree;
        $ugDegree->user_id          = auth()->user()->id;
        $ugDegree->passed_out       = $request->passed_out;
        $ugDegree->studying_year    = $request->studying_year;
        $ugDegree->specializtion_id = $specializtion->id;
        $ugDegree->college_id       = $college->id;
        $ugDegree->degree_id        = $degree->id;
        $ugDegree->save();
        return redirect()->back()->with('success', 'Ug Degree successfully Updated');
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
        $getDegree = UserUgDegree::find($id);
        return view('edit-ug-degree', compact('getDegree'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EducationRequest $request, $id)
    {
        $degree          = Degree::find($request->degree_id);
        $degree->name    = $request->degree;
        if($request->file('degree_image')){
        $degreeImage     = $request->file('degree_image')->getClientOriginalName();
        $request->file('degree_image')->move(public_path('assets/images/'),$degreeImage);
        $degree->image   = $degreeImage;
        }
        $degree->save();

        $specializtion        = Specializtion::find($request->specialization_id);
        $specializtion->name  = $request->specializtion;
        if($request->file('specialization_image')){
        $specializtionImage   = $request->file('specialization_image')->getClientOriginalName();
        $request->file('specialization_image')->move(public_path('assets/images/'),$specializtionImage);
        $specializtion->image = $specializtionImage;
        }
        $specializtion->save();


        $college           = College::find($request->college_id);
        $college->name     = $request->college;
        $college->location = $request->location;
        if($request->file('college_image')){
        $collegeImage      = $request->file('college_image')->getClientOriginalName();
        $request->file('college_image')->move(public_path('assets/images/'),$collegeImage);
        $college->image    = $collegeImage;
        }
        $college->save();

        $ugDegree                   = UserUgDegree::find($id);
        $ugDegree->user_id          = auth()->user()->id;
        $ugDegree->passed_out       = $request->passed_out;
        $ugDegree->studying_year    = $request->studying_year;
        $ugDegree->specializtion_id = $specializtion->id;
        $ugDegree->college_id       = $college->id;
        $ugDegree->degree_id        = $degree->id;
        $ugDegree->save();
        return redirect()->back()->with('success', 'Ug Degree successfully Updated');
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
