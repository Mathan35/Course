<?php

namespace App\Helpers;
use App\Models\Enquiry;
use App\Models\Course;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

trait General{

    public function enquiryId(){

        $enquiry_id   = "UE".rand();
        $check_id = Enquiry::where('enquiry_id',$enquiry_id)->first();

        if($check_id){
            $this->enquiryId();
        }
        else{
            return $enquiry_id;
        }
    }

    public function referenceNumber(){

        $invoice_number   = "IN".rand();
        $check_rf = Payment::where('tax_number',$invoice_number)->first();

        if($check_rf){
            $this->referenceNumber();
        }
        else{
            return $invoice_number;
        }
    }
    public function checkUser($id){
        $checkEnquiry  = QueryBuilder::for(Enquiry::class)->where('user_id',auth()->user()->id)->where('course_id',$id)->where('status',"!=","4")->first();
        return $checkEnquiry;
    }

    public function getEnquiryList($status){
        $enquiry = QueryBuilder::for(Enquiry::class)->orderBy('id', 'desc')->where('status',$status)->with('Payment')->get();
        return view('admin.payment.enquiry-list', compact('enquiry'));
    }
    public function updateStatus($id, $status){
        $userStatus         = User::find($id);
        $userStatus->status = $status;
        $userStatus->save();
        return redirect()->back()->with('success', 'Status successfully Updated');
    }

    public function getPendingList(){
        $enquiry = QueryBuilder::for(Enquiry::class)->where('status','!=',"4")->where('status','!=',"3")->orderBy('id', 'desc')->with('Payment')->get();
        $enquiryId = [];
        foreach ($enquiry as $item){
            $data = 0;
            foreach ($item->payment as $value){
                  $data += $value->amount;
            }
            if($data < $item->Course->price)
             array_push($enquiryId,$item->enquiry_id);

        }
        $getEnquiry = Enquiry::whereIn('enquiry_id',$enquiryId)->with('Payment')->get();
        return $getEnquiry;
    }


 

}