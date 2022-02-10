<?php

namespace App\Http\Livewire;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Category;
use App\Models\Course;
use App\Models\Technology;
use Livewire\Component;

class AllCourse extends Component
{
    public $coursePrice;
    public $category;
    public $technology;
    public $course;

    public $getCategory;
    public $getTechnology;
    public $getPrice;

    public $findCategory;
    public $findTechnology;

    public function render()
    {
        if($this->getCategory != 0 && $this->getTechnology == 0 && $this->getPrice == 0)
        {
            $this->findCategory = Category::find($this->getCategory);
            $this->course       = $this->findCategory->course()->get();
        }
        elseif($this->getCategory == 0 && $this->getTechnology != 0 && $this->getPrice == 0)
        {
            $this->findTechnology = Technology::find($this->getTechnology);
            $this->course         = $this->findTechnology->course()->get();
        }
        elseif($this->getCategory == 0 && $this->getTechnology == 0 && $this->getPrice != 0)
        {
            $this->course  = QueryBuilder::for(Course::class)->where('id',$this->getPrice)->get();
        }
        elseif($this->getCategory != 0 && $this->getTechnology != 0 && $this->getPrice == 0)
        {  
            $category     = $this->getCategory($this->getCategory);
            $technology   = $this->GetTechnology($this->getTechnology);
            $this->course = Course::whereIn('id',array_intersect($category,$technology))->get();
        }
        elseif($this->getCategory == 0 && $this->getTechnology != 0 && $this->getPrice != 0)
         {
            $category     = $this->GetTechnology($this->getTechnology);
            $technology   = QueryBuilder::for(Course::class)->where('id',$this->getPrice)->get()->pluck('id')->toArray();
            $this->course = Course::whereIn('id',array_intersect($category,$technology))->get();
         }
         elseif($this->getCategory != 0 && $this->getTechnology == 0 && $this->getPrice != 0)
         {
            $category      = $this->getCategory($this->getCategory);
            $technology    = QueryBuilder::for(Course::class)->where('id',$this->getPrice)->get()->pluck('id')->toArray();
            $this->Course = Course::whereIn('id',array_intersect($category,$technology))->get();
         }
         elseif($this->getCategory != 0 && $this->getTechnology != 0 && $this->getPrice != 0)
         {
            $category     = $this->getCategory($this->getCategory);
            $technology   = $this->getTechnology($this->getTechnology);
            $course       = QueryBuilder::for(Course::class)->where('id',$this->getPrice)->get()->pluck('id')->toArray();
            $this->course = Course::whereIn('id',array_intersect(array_intersect($category,$technology),$course))->get();
         }
        else
        {
            $this->course      = QueryBuilder::for(Course::class)->get();
        }

        $this->coursePrice = QueryBuilder::for(Course::class)->select(['id','price'])->get();
        $this->category    = QueryBuilder::for(Category::class)->get();
        $this->technology  = QueryBuilder::for(Technology::class)->get();

        return view('livewire.all-course');
    }

    public function getCategory($category){
        $this->findCategory = Category::find($category);
        $categoryId         = $this->findCategory->Course()->get()->pluck('id')->toArray();
        return $categoryId;
    }
    public function getTechnology($technology){
        $this->findTechnology = Technology::find($technology);
        $technologyId         = $this->findTechnology->Course()->get()->pluck('id')->toArray();
        return $technologyId;
    }


}
