<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\finalProposalResult;
use App\Http\Controllers\Admin\oralProposalResultController;
use App\Http\Controllers\Admin\titleProposalResultController;
use App\Http\Controllers\Result;

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
Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegisterForm'])->name('register');

//USER WEBPAGE
Route::prefix('/')->middleware(['auth', 'user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('home/{course_name}', [HomeController::class, 'viewCoursePost']);
    Route::get('home/{course_name}/{section_name}', [HomeController::class, 'viewSectionPost']);
    Route::get('home/{course_name}/{section_name}/{group_name}', [HomeController::class, 'viewGroupPost']);

    Route::get('home/{course_name}/{section_name}/{group_name}/title_evalutaion', [HomeController::class, 'viewTitleEval']);
    Route::get('home/{course_name}/{section_name}/{group_name}/final_evaluation', [HomeController::class, 'viewFinalEval']);
    Route::get('home/{course_name}/{section_name}/{group_name}/oral_evaluation', [HomeController::class, 'viewOralEval']);

    Route::post('home/{course_name}/{section_name}/{group_name}/title_evalutaion/submitted', [HomeController::class, 'storeTitleEval']);
    Route::get('home/{course_name}/{section_name}/{group_name}/title_evalutaion/result', [Result::class, 'resultIndex']);


    Route::post('home/{course_name}/{section_name}/{group_name}/final_evaluation/submitted', [HomeController::class, 'storeFinalEval']);
    Route::get('home/{course_name}/{section_name}/{group_name}/final_evaluation/result', [Result::class, 'finaleEvalResult']);

    Route::post('home/{course_name}/{section_name}/{group_name}/oral_evaluation/submitted', [HomeController::class, 'storeOralEval']);
    Route::get('home/{course_name}/{section_name}/{group_name}/oral_evaluation/result', [Result::class, 'oralEvalResult']);
    
});

//SYSTEM ADMIN WEBPAGE
Route::prefix('admin')->middleware(['auth', 'systemadmin'])->group(function () {

    // SYSTEM ADMIN DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // SYSTEM ADMIN VIEW USER
    Route::get('/user', [UserController::class, 'index']);
    // SYSTEM ADMIN CREATE USER
    Route::post('users/create', [UserController::class, 'store']);
    //UPDATE USER STATUS
    Route::get('user/update', [UserController::class, 'updateStatus'])->name('users.update.status');

    // SYSTEM ADMIN VIEW COURSE
    Route::get('/course', [CourseController::class, 'index']);
    // SYSTEM ADMIN ADD COURSE
    Route::post('course/create', [CourseController::class, 'store']);
    // UPDATE COURSE STATUS
    Route::get('course/update', [CourseController::class, 'courseupdateStatus'])->name('course.update.status');
    // UPDATE DATA COURSE
    Route::post('course/edit', [CourseController::class, 'courseupdateData']);

    // SYSTEM ADMIN VIEW SECTION
    Route::get('/section', [SectionController::class, 'index']);
    // SYSTEM ADMIN ADD SECTION
    Route::post('section/create', [SectionController::class, 'store']);
    // UPDATE SECTION STATUS
    Route::get('section/update', [SectionController::class, 'sectionupdateStatus'])->name('section.update.status');
    // UPDATE DATA SECTION
    Route::post('section/edit', [SectionController::class, 'sectionupdateData']);
});

Route::prefix('adviser')->middleware(['auth', 'adviser'])->group(function () {

    //DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'adviser']);

    //STUDENT
    Route::get('/student', [StudentController::class, 'index']);
    Route::post('student/create', [StudentController::class, 'store']);
    Route::post('student/edit', [StudentController::class, 'studentupdateData']);
    Route::post('student/update', [StudentController::class, 'studentupdateStatus']);
    Route::post('student/unarchive',[StudentController::class, 'unarchive']);
    Route::get('student/search', [StudentController::class, 'searchStudentdata'])->name('student.search');

    // GROUP
    Route::get('/group', [GroupController::class, 'index']);
    Route::post('group/create', [GroupController::class, 'store']);
    Route::post('group/update', [GroupController::class, 'groupupdateStatus']);
    Route::post('group/edit', [GroupController::class, 'groupupdateData']);
    Route::get('group/search', [GroupController::class, 'searchGroupdata'])->name('group.search');
    Route::post('group/unarchive',[GroupController::class, 'unarchive']);
    

    //EVALUATION
    Route::get('/title_proposal_evaluation', [titleProposalResultController::class, 'index']);
    Route::get('title_proposal_evaluation/{id}/result', [titleProposalResultController::class, 'viewresultBygroup']);
    Route::get('/final_proposal_evaluation', [finalProposalResult::class, 'index']);
    Route::get('/final_proposal_evaluation/{id}/result', [finalProposalResult::class, 'viewresultBygroup']);

    Route::get('/oral_evaluation',[oralProposalResultController::class, 'index']);

    Route::get('oral_evaluation/{id}/result',[oralProposalResultController::class, 'viewresultBygroup']);
});
