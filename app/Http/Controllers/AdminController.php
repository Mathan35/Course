<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Technology;
use App\Models\Course;
use App\Models\Enquiry;
use App\Models\Payment;
use App\Models\User;
use App\Models\Batch;
use App\Models\Setting;
use App\Models\CourseTechnology;
use App\Http\Requests\TechnologyRequest;
use App\Http\Requests\CourseRequest;
use App\Http\Requests\CourseTechnologyRequest;
use App\Http\Requests\PaymentRequest;
use App\Helpers\General;
use App\Helpers\Validate;
use Carbon\Carbon;

class AdminController extends Controller
{
    use General;
    use Validate;

    public function adminDashboard(){
        $enquiry      = QueryBuilder::for(Enquiry::class)->orderBy('id', 'desc')->where('created_at', '>=', Carbon::today())->get();        
        $enquiryCount = QueryBuilder::for(Enquiry::class)->count();
        $userCount    = QueryBuilder::for(User::class)->count();
        $course       = QueryBuilder::for(Course::class)->get();
        $courseCount  = QueryBuilder::for(Course::class)->count();
        $paymentCount = QueryBuilder::for(Payment::class)->get()->sum('amount');
        return view('admin.dashboard',compact('enquiryCount', 'userCount', 'paymentCount', 'enquiry', 'course','courseCount'));
    }
    public function adminProfile(){
        return view('admin.admin-profile');
    }
    public function enquiryList($status){
       return $this->getEnquiryList($status);
    }
    public function enquiryStatus($id ,$status){
        return $this->validatePayment($id, $status);
    }
    public function paymentView(){
        $getEnquiry = $this->getPendingList();
        return view('admin.payment.payment-check', compact('getEnquiry'));
    }
    public function paymentUpdate($id){
        $batch            = QueryBuilder::for(Batch::class)->get();
        $enquiry          = QueryBuilder::for(Enquiry::class)->find($id);
        $collectEnquiries = collect($enquiry->Payment);
        $collectPayments  = collect($collectEnquiries)->pluck("enquiry_id")->unique();
        $paymentModes     = QueryBuilder::for(Payment::class)->whereIn("enquiry_id",$collectPayments)->get()->pluck('payment_mode')->toArray();
        return view('admin.payment.payment-update', compact('enquiry', 'batch','paymentModes'));
    }

    public function storePayment(PaymentRequest $request){

        $enquiry = QueryBuilder::for(Enquiry::class)->find($request->enquiry_id);
        $paymentSum = $enquiry->payment->sum('amount');

         if($enquiry->course->price < ($paymentSum + $request->amount)){
            return redirect()->back()->with('fail', 'Entered Amount is higher than Course Price');
         }
         else{
            if($request->batch_id != null){
                $enquiry           = QueryBuilder::for(Enquiry::class)->find($enquiry->id);
                $enquiry->batch_id = $request->batch_id;
                $enquiry->save();
            }
             
            $payment                   = new Payment;
            $payment->enquiry_id       = $enquiry->enquiry_id;
            $payment->payment_method   = $request->payment_method;
            $payment->payment_mode     = $request->payment_mode;
            $payment->amount           = $request->amount;
            $payment->tax_number       = $this->ReferenceNumber();
            $payment->reference_number = $request->reference_number;
            $payment->save();

            $enquiry->status  = "2";
            $enquiry->save();

            return redirect()->back()->with('success', 'Payment successfully Updated');
         }
    }
    public function viewPayment($enquiry_id){
        $enquiry    = QueryBuilder::for(Enquiry::class)->where('enquiry_id' ,$enquiry_id)->first();
        $payment    = QueryBuilder::for(Payment::class)->where('enquiry_id', $enquiry_id)->orderBy('id', 'desc')->get();
        $paymentSum = QueryBuilder::for(Payment::class)->where('enquiry_id', $enquiry_id)->get()->sum('amount');
        return view('admin.payment.view-payment', compact('payment','enquiry','paymentSum'));
    }
    public function usersList(){
        $user = QueryBuilder::for(User::class)->get();
        return view('admin.users.users-list', compact('user'));
    }
    public function viewUser($id){
        $user = QueryBuilder::for(User::class)->find($id);
        return view('admin.users.view-user', compact('user'));
    }

    public function userStatus($id ,$status){
      return $this->UpdateStatus($id, $status);
    }

    public function userCourse(){
        $enquiry = QueryBuilder::for(Enquiry::class)->with('user','course')->orderBy('id', 'desc')->where('status',"2")->Orwhere('status',"3")->get();
        return view('admin.users.users-course', compact('enquiry'));

    }

    public function paymentDetails(){
        $enquiry      = QueryBuilder::for(Enquiry::class)->get();        
        return view('admin.payment.payment-details', compact('enquiry'));

    }
    public function pendingPayment(){
        $getEnquiry = $this->GetPendingList();
        return view('admin.payment.payment-pending', compact('getEnquiry'));

    }
    public function paymentHistory(){
        $payment      = QueryBuilder::for(Payment::class)->orderBy('id', 'desc')->get();        
        return view('admin.payment.payment-history', compact('payment'));
    }

    public function batchUsers(){
        $batch  = QueryBuilder::for(Batch::class)->with('enquiry')->orderBy('id', 'desc')->get();       
        return view('admin.batch.batch-users', compact('batch'));

    }
    public function viewBatchUsers($id){+
        $batch  = QueryBuilder::for(Batch::class)->with('enquiry')->find($id);       
        return view('admin.batch.view-batch-users', compact('batch'));
    }
    public function settings(){
        $settings  = QueryBuilder::for(Setting::class)->first();   
        if($settings){
            $settings  = QueryBuilder::for(Setting::class)->first();   
            return view('admin.settings', compact('settings'));
        }    
        $settings = null;
        return view('admin.settings', compact('settings'));
    }
    public function updateSettings(Request $request){
      
        $settings = Setting::find(1);

        if($request->file('logo') != null){
            $logo  = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('assets/images/'),$logo);
            $settings->logo = $logo;
        }
        if($request->file('background_image') != null){
            $background_image  = $request->file('background_image')->getClientOriginalName();
            $request->file('background_image')->move(public_path('assets/images/'),$background_image);
            $settings->background_image = $background_image;
        }      
         if($request->file('background_centered_image') != null){
            $background_centered_image  = $request->file('background_centered_image')->getClientOriginalName();
            $request->file('background_centered_image')->move(public_path('assets/images/'),$background_centered_image);
            $settings->background_centered_image = $background_centered_image;
        }
         if($request->file('login_background_image') != null){
            $login_background_image  = $request->file('login_background_image')->getClientOriginalName();
            $request->file('login_background_image')->move(public_path('assets/images/'),$login_background_image);
            $settings->login_background_image = $login_background_image;
        }
        $settings->name = $request->name;
        $settings->background_title = $request->background_title;
        $settings->background_header = $request->background_header;
        $settings->background_description = $request->background_description;
        $settings->save();

        return redirect()->back()->with('success', 'Settings successfully Updated');

    }

  
}
