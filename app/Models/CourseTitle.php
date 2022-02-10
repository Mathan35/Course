<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTitle extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'course_id',
        'title',
    ];

    public function course()
    {
        return $this->hasOne(Course::class,'id','course_id');
    }
    //for roles to permissio
    public function courseTitleDescription()
    {
        return $this->HasMany(CourseTitleDetail::class);
    }
}
