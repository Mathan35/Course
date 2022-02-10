<?php

namespace App\Policies;
use App\Helpers\Validate;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CourseTechnologyPolicy
{
    use Validate;
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function CreateCourseTechnology(){
        return $this->getPermissions($permission = "create-course-technology");
    }
    public function ViewCourseTechnology(){
        return $this->getPermissions($permission = "view-course-technology");
    }
    public function EditCourseTechnology(){
        return $this->getPermissions($permission = "edit-course-technology");
    }
}
