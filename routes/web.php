<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});





Auth::routes();

// REGISTRATION FOR ADMIN ROLE
Route::get('/register',[\App\Http\Controllers\Auth\RegisterController::class, 'showRegisterForm'])->name('register');

//USER WEBPAGE
Route::prefix('/')->middleware(['auth','user'])->group(function (){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('home/{course_name}',[App\Http\Controllers\HomeController::class, 'viewCoursePost']);
    Route::get('home/{course_name}/{section_name}',[App\Http\Controllers\HomeController::class, 'viewSectionPost']);
    Route::get('home/{course_name}/{section_name}/{group_name}',[App\Http\Controllers\HomeController::class, 'viewGroupPost']);

    Route::get('home/{course_name}/{section_name}/{group_name}/title_evalutaion',[App\Http\Controllers\HomeController::class, 'viewTitleEval']);

    Route::post('home/{course_name}/{section_name}/{group_name}/title_evalutaion/submitted',[App\Http\Controllers\HomeController::class, 'storeTitleEval']);

    Route::get('home/{course_name}/{section_name}/{group_name}/title_evalutaion/submitted',[App\Http\Controllers\Result::class, 'submittedIndex']);

    Route::get('home/{course_name}/{section_name}/{group_name}/title_evalutaion/result',[App\Http\Controllers\Result::class, 'resultIndex']);
    
    
});

//SYSTEM ADMIN WEBPAGE
Route::prefix('admin')->middleware(['auth','systemadmin'])->group(function (){

    // SYSTEM ADMIN DASHBOARD
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    // SYSTEM ADMIN VIEW USER
    Route::get('/user', [App\Http\Controllers\Admin\UserController::class, 'index']);
    // SYSTEM ADMIN CREATE USER
    Route::post('users/create',[App\Http\Controllers\Admin\UserController::class, 'store']);
    //UPDATE USER STATUS
    Route::get('user/update', [App\Http\Controllers\Admin\UserController::class, 'updateStatus'])->name('users.update.status');
    
    // SYSTEM ADMIN VIEW COURSE
    Route::get('/course', [App\Http\Controllers\Admin\CourseController::class, 'index']);
    // SYSTEM ADMIN ADD COURSE
    Route::post('course/create', [App\Http\Controllers\Admin\CourseController::class, 'store']);
    // UPDATE COURSE STATUS
    Route::get('course/update', [App\Http\Controllers\Admin\CourseController::class, 'courseupdateStatus'])->name('course.update.status');
    // UPDATE DATA COURSE
    Route::post('course/edit', [App\Http\Controllers\Admin\CourseController::class, 'courseupdateData']);

    // SYSTEM ADMIN VIEW SECTION
    Route::get('/section', [App\Http\Controllers\Admin\SectionController::class, 'index']);
    // SYSTEM ADMIN ADD SECTION
    Route::post('section/create',[App\Http\Controllers\Admin\SectionController::class, 'store']);
    // UPDATE SECTION STATUS
    Route::get('section/update', [App\Http\Controllers\Admin\SectionController::class, 'sectionupdateStatus'])->name('section.update.status');
    // UPDATE DATA SECTION
    Route::post('section/edit',[App\Http\Controllers\Admin\SectionController::class, 'sectionupdateData']);

    // SYSTEM ADMIN VIEW GROUP
    Route::get('/group', [App\Http\Controllers\Admin\GroupController::class, 'index']);
    // SYSTEM ADMIN ADD GROUP
    Route::post('group/create', [App\Http\Controllers\Admin\GroupController::class, 'store']);
    // UPDATE GROUP STATUS
    Route::get('group/update', [App\Http\Controllers\Admin\GroupController::class, 'groupupdateStatus'])->name('group.update.status');
    // UPDATE DATA GROUP
    Route::post('group/edit', [App\Http\Controllers\Admin\GroupController::class, 'groupupdateData']);

    // SYSTEM ADMIN VIEW MEMBER
    Route::get('/member', [App\Http\Controllers\Admin\MemberController::class, 'index']);
    // SYSTEM ADMIN ADD MEMBERS
    Route::post('member/create', [App\Http\Controllers\Admin\MemberController::class, 'store']);
    // UPDATE MEMBER STATUS
    Route::get('member/update', [App\Http\Controllers\Admin\MemberController::class, 'memberupdateStatus'])->name('member.update.status');
    // UPDATE DATA MEMBER
    Route::post('member/edit',[App\Http\Controllers\Admin\MemberController::class, 'memberDataUpdate']);


    //SYSTEM ADMIN VIEW TITLE PROPOSAL RESULTS
    Route::get('/title_proposal_evaluation', [App\Http\Controllers\Admin\titleProposalResultController::class, 'index']);
    // SYSTEM ADMIN VIEW RESULT BY GROUP
    Route::get('title_proposal_evaluation/{id}/result', [App\Http\Controllers\Admin\titleProposalResultController::class, 'viewresultBygroup']);


});