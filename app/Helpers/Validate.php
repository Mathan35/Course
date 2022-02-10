<?php

namespace App\Helpers;
use App\Models\Enquiry;
use App\Models\Course;
use App\Models\Payment;
use App\Models\Learning;
use App\Models\CourseTechnology;
use App\Models\CourseTitle;
use App\Models\CourseTitleDetail;
use App\Models\Technology;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

trait Validate{
  
    public function validateCourse($id){
        $checkLearning         = QueryBuilder::for(Learning::class)->where('course_id',$id)->first();
        $checkCourseTechnology = QueryBuilder::for(CourseTechnology::class)->where('course_id',$id)->first();
        $checkCourseTitle      = QueryBuilder::for(CourseTitle::class)->where('course_id',$id)->first();

        if($checkLearning || $checkCourseTechnology || $checkCourseTitle){
            return redirect()->back()->with('success', 'Course already used in Learnings');
        }
        else{
            Course::find($id)->delete();
            return redirect()->back()->with('success', 'Course successfully Deleted');
        }
    }

    public function validateTechnology($id){
        $checkTechnology   = QueryBuilder::for(CourseTechnology::class)->where('course_id',$id)->first();
        if($checkTechnology){
            return redirect()->back()->with('success', 'Technology already used Course Technology');
        }
        else{
            Technology::find($id)->delete();
            return redirect()->back()->with('success', 'Technology successfully Deleted');
        }
    }

    public function validateCourseTechnology($id){
        $checkCourseTitleDetail   = QueryBuilder::for(CourseTitleDetail::class)->where('course_title_id',$id)->first();
        if($checkCourseTitleDetail){
            return redirect()->back()->with('success', 'Course Title already used in Course Title Description');
        }
        else{
            CourseTitle::find($id)->delete();
            return redirect()->back()->with('success', 'Course successfully Deleted');
        }
    }
    public function validatePayment($id, $status){
        $enquiryUpdate = Enquiry::find($id);
        $totalAmount   = $enquiryUpdate->course->price;
        $paymentSum    = QueryBuilder::for(Payment::class)->where("enquiry_id",$enquiryUpdate->enquiry_id)->get()->sum('amount');
        
        if($status == 3 && $paymentSum-$totalAmount == 0){
            $enquiryUpdate->status = $status;
            $enquiryUpdate->save();
            return redirect()->back()->with('success', 'Status successfully Updated');
        }
        elseif ($status != 3){
            $enquiryUpdate->status = $status;
            $enquiryUpdate->save();
            return redirect()->back()->with('success', 'Status successfully Updated');
        }
        else{
            return redirect()->back()->with('success', 'Full Payment Not Paid');
 
        }
       

    }

    public function getPermissions($permission){
        $Role = Role::find(auth()->user()->role);
        $GetPermissions = $Role->permissions()->get()->toArray();
        $colection = collect($GetPermissions); 
        $UserPermissions = $colection->pluck('name')->toArray();
        $validatePermission = in_array($permission,$UserPermissions);
        return $validatePermission;
    }

}