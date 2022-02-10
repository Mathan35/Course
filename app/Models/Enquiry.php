<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;


      /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'status',
        'enquiry_id',
        'date',
        'time',
        'course_id',
    ];

     //for enquiry to course
     public function course()
     {
         return $this->hasOne(Course::class, 'id', 'course_id');
     }
    //for enquiry to course
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    //for enquiry to course
    public function payment()
    {
        return $this->hasMany(Payment::class, 'enquiry_id', 'enquiry_id');
    }
}
