<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
//login route
Route::get('/', [AuthController::class, 'login']);

Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('logout', [AuthController::class, 'logout']);

//register route
Route::get('/register', [AuthController::class, 'register']);
Route::get('/forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('/forgot-password', [AuthController::class, 'PostForgotPassword']);
Route::get('/reset/{token}', [AuthController::class, 'reset']);
Route::post('/reset/{token}', [AuthController::class, 'PostReset']);




Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});


// Route::get('/admin/admin/list', function () {
//     return view('admin.admin.list');
// });



///grouping routes
Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class, 'addadmin']);
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'editadmin']);
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'updateadmin']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'deleteadmin']);

    //change password
    Route::get('admin/change_password', [UserController::class, 'change_password']);
    Route::post('admin/change_password', [UserController::class, 'update_change_password']);
    // Route::get('/admin/dashboard', function () {
    //     return view('admin.dashboard');
    // });



    //students
    Route::get('admin/student/list', [StudentController::class, 'list']);
    Route::get('admin/student/add', [StudentController::class, 'add']);
    Route::post('admin/student/add', [StudentController::class, 'addstudent']);
    Route::get('admin/student/edit/{id}', [StudentController::class, 'editadmin']);
    Route::post('admin/student/edit/{id}', [StudentController::class, 'updateadmin']);


    //classmroutes
    Route::get('admin/class/list', [ClassController::class, 'list']);
    Route::get('admin/class/add', [ClassController::class, 'add']);
    Route::post('admin/class/add', [ClassController::class, 'addclass']);
    Route::get('admin/class/edit/{id}', [ClassController::class, 'edit']);
    Route::post('admin/class/edit/{id}', [ClassController::class, 'editclass']);


    //subjectroutes
    Route::get('admin/subject/list', [SubjectController::class, 'list']);
    Route::get('admin/subject/add', [SubjectController::class, 'add']);
    Route::post('admin/subject/add', [SubjectController::class, 'addsubject']);
    Route::get('admin/subject/edit/{id}', [SubjectController::class, 'edit']);
    Route::post('admin/subject/edit/{id}', [SubjectController::class, 'editSubject']);
    Route::get('admin/subject/delete/{id}', [SubjectController::class, 'deleteSubject']);



    //assign subject route
    Route::get('admin/assign_subject/list', [ClassSubjectController::class, 'list']);
    Route::get('admin/assign_subject/add', [ClassSubjectController::class, 'add']);
    Route::post('admin/assign_subject/add', [ClassSubjectController::class, 'addsubject']);
    Route::get('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'editClassSubject']);
    Route::get('admin/assign_subject/edit_single/{id}', [ClassSubjectController::class, 'editClassSubjectSingle']);
    Route::post('admin/assign_subject/edit_single/{id}', [ClassSubjectController::class, 'updateClassSubjectSingle']);
    Route::post('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'updateClassSubject']);
    Route::get('admin/assign_subject/delete/{id}', [ClassSubjectController::class, 'deleteAssignedSubject']);
    


});




Route::group(['middleware' => 'teacher'], function () {
    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']);

    //change password
    Route::get('teacher/change_password', [UserController::class, 'change_password']);
    Route::post('teacher/change_password', [UserController::class, 'update_change_password']);

    // Route::get('/teacher/dashboard', function () {
    //     return view('admin.dashboard');
    // });
});
Route::group(['middleware' => 'student'], function () {
    Route::get('student/dashboard', [DashboardController::class, 'dashboard']);
    //change password
    Route::get('student/change_password', [UserController::class, 'change_password']);
    Route::post('student/change_password', [UserController::class, 'update_change_password']);

    // Route::get('/student/dashboard', function () {
    //     return view('admin.dashboard');
    // });
});
Route::group(['middleware' => 'parent'], function () {
    Route::get('parent/dashboard', [DashboardController::class, 'dashboard']);
    //change password
    Route::get('parent/change_password', [UserController::class, 'change_password']);
    Route::post('parent/change_password', [UserController::class, 'update_change_password']);

    // Route::get('/parent/dashboard', function () {
    //     return view('admin.dashboard');
    // });
});
