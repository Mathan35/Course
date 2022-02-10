<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Course;
use App\Models\Country;
use App\Models\User;
use App\Models\Degree;
use App\Models\College;
use App\Models\Specializtion;
use App\Models\UserUgDegree;
use App\Models\UserPgDegree;
use App\Models\Enquiry;
use App\Models\Category;
use App\Models\Technology;
use App\Http\Requests\EducationRequest;
use Carbon\Carbon;
use App\Helpers\General;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

use function PHPUnit\Framework\returnSelf;

class HomeController extends Controller
{

    use General;

    public function dashboard(){
        if(auth()->user()->role != "0"){
            return redirect(route('admin-dashboard'));
        }
        return view('dashboard');
    }
    public function userProfile(){
        if(auth()->user()->role != "0"){
            return redirect(route('admin-profile'));
        }
        return view('user-profile');
    }
    public function updateProfile(Request $request){
        $user = User::find(auth()->user()->id);

        if($request->file('image') != null){
            $image  = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('assets/images/'),$image);
            $user->profile_photo_path = $image;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->back()->with('success', 'Profile Information Stored successfully');

    }

    public function index(){
        $course      = QueryBuilder::for(Course::class)->get();
        $category    = QueryBuilder::for(Category::class)->get();
        $technology  = QueryBuilder::for(Technology::class)->get();
        $user        = QueryBuilder::for(User::class)->where("role","!=",1)->get()->count();
        $enquiry     = QueryBuilder::for(Enquiry::class)->get()->count();
        return view('welcome', compact('course','category', 'technology','user','enquiry'));
    }
    public function register(){
        $country      = QueryBuilder::for(Country::class)->get();
        return view('auth.register', compact('country'));
    }
    public function educationDetail(){
        $getEducation   = QueryBuilder::for(UserUgDegree::class)->where('user_id',auth()->user()->id)->first();
        $getPgEducation = QueryBuilder::for(UserPgDegree::class)->where('user_id',auth()->user()->id)->first();
        return view('education-detail', compact('getEducation','getPgEducation'));
    }
    public function viewCourse($id){
        $course        = QueryBuilder::for(Course::class)->find($id);
        $checkEnquiry  = $this->CheckUser($id);
        return view('view-course', compact('course','checkEnquiry'));
    }

    public function enquiry(Request $request, $id){
    
        $enquiry             = new Enquiry;
        $enquiry->user_id    = auth()->user()->id;
        $enquiry->course_id  = $id;
        $enquiry->status     = 0;
        $enquiry->date       = Carbon::today()->toDateString();
        $enquiry->time       = Carbon::now()->toTimeString();
        $enquiry->enquiry_id = $this->EnquiryId();
        $enquiry->save();
        return redirect()->back()->with('success', 'Enquiry Submitted successfully');
      
    }
    public function viewEnquiry(){
        if(auth()->user()->role != "0"){
            return redirect(route('admin-dashboard'));
        }
        $enquiryCourses    = QueryBuilder::for(Enquiry::class)->where('user_id',auth()->user()->id)->get();
        return view('view-enquiry', compact('enquiryCourses'));
    }

    public function searchAutocomplete(Request $request){
        if($request->ajax()) {
            if($request->course != null){
            
                $data = Course::where('name', 'LIKE', $request->course.'%')
                    ->get();
            
                $output = '';
            
                if (count($data)>0) 
                {
                
                    $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
                
                    foreach ($data as $row){
                    
                        $output .= '<li class="list-group-item">'.$row->name.'</li>';
                    }
                
                    $output .= '</ul>';
                }
                else
                {
                
                    $output .= '<li class="list-group-item">'.'No results'.'</li>';
                }

                return $output;
            }
            else
            {
                return null;
            }
        }
    }


    public function searchResult(Request $request){
        $course      = QueryBuilder::for(Course::class)->get();
        $category    = QueryBuilder::for(Category::class)->get();
        $technology  = QueryBuilder::for(Technology::class)->get();
        $user        = QueryBuilder::for(User::class)->where("role","!=",1)->get()->count();
        $enquiry     = QueryBuilder::for(Enquiry::class)->get()->count();
        $search = $request->course_name;
        $searchResult = Course::where('name', $search)->get();
        return view('search-results', compact('searchResult','search','course','category', 'technology','user','enquiry'));
    }

    public function searchCategory($id)
    {
        $course      = QueryBuilder::for(Course::class)->get();
        $category    = QueryBuilder::for(Category::class)->get();
        $technology  = QueryBuilder::for(Technology::class)->get();
        $user        = QueryBuilder::for(User::class)->where("role","!=",1)->get()->count();
        $enquiry     = QueryBuilder::for(Enquiry::class)->get()->count();
        $courseCategory    = QueryBuilder::for(Category::class)->allowedIncludes('Course')->find($id);
        return view('search-category', compact('course','category', 'technology','user','enquiry','courseCategory'));

    }
    
    public function viewPaymentHistory()
    {
        $enquiry   = QueryBuilder::for(Enquiry::class)->where('user_id',auth()->user()->id)->orderBy('id', 'desc')->get(); 
        return view('payment-history', compact('enquiry'));       
    }
    public function allCourses(){
        return view('all-courses');
    }
}
