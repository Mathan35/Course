<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;


      /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'short_description',
        'price',
        'actual_price',
        'detailed_description',
        'image',
        'video_url',
    ];

    public function categories()
     {
        return $this->belongsToMany(Category::class, 'category_courses');
     }

     //for roles to permissio
     public function technology()
     {
         return $this->belongsToMany(Technology::class, 'course_technologies')->withTimestamps();
     }

     //for roles to permissio
     public function learning()
     {
         return $this->hasMany(Learning::class);
     }

     //for roles to permissio
     public function enquiry()
     {
         return $this->hasMany(Enquiry::class);
     }
      //for roles to permissio
      public function coursetitles()
      {
          return $this->hasMany(CourseTitle::class);
      }
}
