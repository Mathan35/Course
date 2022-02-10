<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;


      /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'timing',
    ];

     //for enquiry to course
     public function enquiry()
     {
         return $this->hasMany(Enquiry::class, 'batch_id', 'id');
     }
}
