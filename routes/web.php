<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseTechnologyController;
use App\Http\Controllers\CourseTitleController;
use App\Http\Controllers\CourseTitleDescriptionController;
use App\Http\Controllers\PgDegreeController;
use App\Http\Controllers\UgDegreeController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\CategoryTechnologyController;
use App\Http\Controllers\CategoryCourseController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[HomeController::class, 'index'])->name('home');

Route::get('/user-registration',[HomeController::class, 'register'])->name('user-register');

Route::post('auth-login',[LoginController::class, 'login'])->name('auth-login');

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('dashboard',[HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('user-profile',[HomeController::class, 'userProfile'])->name('profile.show');
    //update profile
    Route::post('update-profile',[HomeController::class, 'updateProfile'])->name('update-profile');
    Route::get('view-payment-history',[HomeController::class, 'viewPaymentHistory'])->name('view-payment-history');
    //ug degree
    Route::resource('ug-degree', UgDegreeController::class);
    //pg degree
    Route::resource('pg-degree', PgDegreeController::class);
    //education detail
    Route::get('education-detail',[HomeController::class, 'educationDetail'])->name('education-detail');
    //view course
    Route::get('view-course/{id}',[HomeController::class, 'viewCourse'])->name('view-course');
    //submit enquiry
    Route::get('enquiry/{id}',[HomeController::class, 'enquiry'])->name('enquiry');
    //view enquiry
    Route::get('view-enquiry',[HomeController::class, 'viewEnquiry'])->name('view-enquiry');
    //admin routes
    Route::prefix('admin')->middleware('can:CheckAdmin,App\Models\User')->group(function(){
        //admin-dashboar
        Route::get('admin-dashboard',[AdminController::class, 'adminDashboard'])->name('admin-dashboard');
        //admin-profile
        Route::get('admin-profile',[AdminController::class, 'adminProfile'])->name('admin-profile');
        //technology
        Route::resource('technology', TechnologyController::class);
        //course
        Route::resource('course', CourseController::class);
        //course-technology
        Route::resource('course-technology', CourseTechnologyController::class);
        //learning
        Route::resource('learning', LearningController::class);
        //learning
        Route::resource('batch', BatchController::class);
        //course title
        Route::resource('course-title', CourseTitleController::class);
        //course technology
        Route::resource('category-technology', CategoryTechnologyController::class);
        //course title
        Route::resource('category-course', CategoryCourseController::class);
        //course title description
        Route::resource('course-title-description', CourseTitleDescriptionController::class);
        //role permission
        Route::resource('role-permission', RolePermissionController::class);
        //role permission
        Route::resource('admin-user', AdminUserController::class);
        //view enquiry
        Route::get('enquiry-list/{status}',[AdminController::class, 'enquiryList'])->name('enquiry-list');
        //view enquiry
        Route::get('enquiy-status/{id}/{status}',[AdminController::class, 'enquiryStatus'])->name('enquiry-status');
        //payment update
        Route::get('payment-update/{id}',[AdminController::class, 'paymentUpdate'])->name('payment-update');
        //payment update
        Route::get('payment-view',[AdminController::class, 'paymentView'])->name('payment-view');
        //payment store
        Route::post('store-payment',[AdminController::class, 'storePayment'])->name('store-payment');
        //payment dtails
        Route::get('payment-details',[AdminController::class, 'paymentDetails'])->name('payment-details');
        //payment dtails
        Route::get('pending-payment',[AdminController::class, 'pendingPayment'])->name('pending-payment');
        //payment history
        Route::get('payment-history',[AdminController::class, 'paymentHistory'])->name('payment-history');
        //view payment
        Route::get('view-payment/{enquiry_id}',[AdminController::class, 'viewPayment'])->name('view-payment');
        //users list
        Route::get('users-list',[AdminController::class, 'usersList'])->name('users-list');
        //view user
        Route::get('view-user/{id}',[AdminController::class, 'viewUser'])->name('view-user');
        //user status
        Route::get('user-status/{id}/{status}',[AdminController::class, 'userStatus'])->name('user-status');
        //user course
        Route::get('users-course',[AdminController::class, 'userCourse'])->name('users-course');
        //user course
        Route::get('batch-users',[AdminController::class, 'batchUsers'])->name('batch-users');
        //user course
        Route::get('view-batch-users/{id}',[AdminController::class, 'viewBatchUsers'])->name('view-batch-users');
        //Settings
        Route::get('settings',[AdminController::class, 'settings'])->name('settings');
        //update Settings
        Route::post('update-settings',[AdminController::class, 'updateSettings'])->name('update-settings');
    });

});

//route for search courses
Route::get('search-autocomplete', [HomeController::class, 'searchAutocomplete'])->name('search-course');
Route::get('search-result', [HomeController::class, 'searchResult'])->name('search-result');
Route::get('search-category/{id}', [HomeController::class, 'searchCategory'])->name('search-category');
Route::get('all-courses/', [HomeController::class, 'allCourses'])->name('all-courses');


