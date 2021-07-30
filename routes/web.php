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

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Members
Route::group(['prefix' => 'member', 'middleware' => ['auth', 'active', 'verified', 'member']], function () {
    Route::get('/', [\App\Http\Controllers\Member\DashboardController::class, 'index'])->name('member');
    Route::match(['get', 'post'], '/profile', [\App\Http\Controllers\Member\DashboardController::class, 'profile'])->name('profile');
    Route::get('/subscription', [\App\Http\Controllers\Member\DashboardController::class, 'plan'])->name('subscription');

    //Settings
    // Route::match(['get', 'post'], '/profile', [\App\Http\Controllers\Student\SettingsController::class, 'index'])->name('student_profile');
    // Route::post('/change-password', [\App\Http\Controllers\Student\ChangePasswordController::class, 'change'])->name('change-password');


    // //Assignment
    // Route::get('log-book', [\App\Http\Controllers\Student\SubjectController::class, 'index'])->name('log-book');
    // Route::get('siwes-week/{id}', [\App\Http\Controllers\Student\SubjectController::class, 'week'])->name('week');
    // Route::post('log', [\App\Http\Controllers\Student\SubjectController::class, 'log'])->name('log');
    // Route::get('delete-assignment/{id}', [\App\Http\Controllers\Student\SubjectController::class, 'delete_assignment']);
    // Route::match(['get', 'post'], '/submit-assignment', [\App\Http\Controllers\Student\SubjectController::class, 'submit'])->name('submit_assgnment');
    // Route::post('/fetch-course', [\App\Http\Controllers\Student\SubjectController::class, 'course']);

    // //Assignment
    // Route::get('assignments', [\App\Http\Controllers\Student\SubjectController::class, 'index']);
    // Route::get('delete-assignment/{id}', [\App\Http\Controllers\Student\SubjectController::class, 'delete_assignment']);
    // Route::match(['get', 'post'], '/submit-assignment', [\App\Http\Controllers\Student\SubjectController::class, 'submit'])->name('submit_assgnment');
    // Route::post('/fetch-course', [\App\Http\Controllers\Student\SubjectController::class, 'course']);
});

// Supervisor
Route::group(['prefix' => 'supervisor', 'middleware' => ['auth', 'active', 'supervisor']], function () {
    Route::get('/', [\App\Http\Controllers\Supervisor\DashboardController::class, 'index'])->name('supervisor');

    //Student
    Route::get('students', [\App\Http\Controllers\Supervisor\StudentsController::class, 'index']);
    Route::get('view/{id}', [\App\Http\Controllers\Supervisor\StudentsController::class, 'view']);

    //Settings
    Route::match(['get', 'post'], '/profile', [\App\Http\Controllers\Supervisor\SettingsController::class, 'index'])->name('supervisor_profile');
    Route::post('/change-password', [\App\Http\Controllers\Supervisor\ChangePasswordController::class, 'change'])->name('supervisor-change-password');
});

//Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin');

    //Settings
    Route::match(['get', 'post'], '/profile', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin_profile');
    Route::post('/change-password', [\App\Http\Controllers\Admin\ChangePasswordController::class, 'change']);
    Route::get('/change-password', [\App\Http\Controllers\Admin\ChangePasswordController::class, 'index']);
    Route::get('/assignments', [\App\Http\Controllers\Admin\SettingController::class, 'assignment']);
    Route::get('delete-assignment/{id}', [\App\Http\Controllers\Admin\SettingController::class, 'delete_assignment']);

    //Schools
    Route::match(['get', 'post'], '/schools', [App\Http\Controllers\Admin\SchoolsController::class, 'create'])->name('admin_create_school');
    Route::get('/create-school', [App\Http\Controllers\Admin\SchoolsController::class, 'create_new']);
    Route::get('/edit-school/{id}', [App\Http\Controllers\Admin\SchoolsController::class, 'edit']);
    Route::get('/view-school/{id}', [App\Http\Controllers\Admin\SchoolsController::class, 'view']);
    Route::get('/delete-school/{id}', [App\Http\Controllers\Admin\SchoolsController::class, 'delete']);

    //Departments
    Route::match(['get', 'post'], '/departments', [App\Http\Controllers\Admin\DepartmentController::class, 'create'])->name('admin_create_department');
    Route::get('/create-department', [App\Http\Controllers\Admin\DepartmentController::class, 'create_new']);
    Route::get('/edit-department/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'edit']);
    Route::get('/delete-department/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'delete']);
    Route::get('/view-department/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'view']);
    Route::get('/view-dept-level/{faculty}/{id}/{level}', [App\Http\Controllers\Admin\DepartmentController::class, 'dept_level']);


    //Courses
    Route::match(['get', 'post'], '/courses', [App\Http\Controllers\Admin\CoursesController::class, 'create'])->name('admin_create_course');
    Route::get('/create-course', [App\Http\Controllers\Admin\CoursesController::class, 'create_page']);
    Route::post('/fetch-dept2', [App\Http\Controllers\Admin\CoursesController::class, 'dept']);
    Route::get('/edit-course/{id}', [App\Http\Controllers\Admin\CoursesController::class, 'edit']);
    Route::get('/view-course/{faculty_id}/{dept_id}/{level_id}/{semester_id}/{course_id}', [App\Http\Controllers\Admin\CoursesController::class, 'view']);
    Route::get('/delete-course/{id}', [App\Http\Controllers\Admin\CoursesController::class, 'delete']);

    //Supervisor
    Route::get('supervisors', [App\Http\Controllers\Admin\SupervisorController::class, 'index']);
    Route::match(['get', 'post'], '/add-supervisor', [App\Http\Controllers\Admin\SupervisorController::class, 'create'])->name('admin_create_supervisor');
    Route::get('/view-supervisor/{id}', [App\Http\Controllers\Admin\SupervisorController::class, 'view']);
    Route::get('/edit-supervisor/{id}', [App\Http\Controllers\Admin\SupervisorController::class, 'edit']);
    Route::post('/fetch-dept', [App\Http\Controllers\Admin\SupervisorController::class, 'dept']);
    Route::get('/delete-supervisor/{id}', [App\Http\Controllers\Admin\SupervisorController::class, 'delete']);
    Route::get('/block-supervisor/{id}', [App\Http\Controllers\Admin\SupervisorController::class, 'block']);
    Route::get('/unblock-supervisor/{id}', [App\Http\Controllers\Admin\SupervisorController::class, 'unblock']);
    Route::post('/fetch-course', [App\Http\Controllers\Admin\SupervisorController::class, 'course']);

    //Student
    Route::get('students', [App\Http\Controllers\Admin\StudentController::class, 'index']);
    Route::match(['get', 'post'], 'create-student', [App\Http\Controllers\Admin\StudentController::class, 'create'])->name('admin_create_student');
    Route::post('create_bulk_student', [App\Http\Controllers\Admin\StudentController::class, 'create_bulk'])->name('admin_create_bulk_student');
    Route::get('/edit-student/{id}', [App\Http\Controllers\Admin\StudentController::class, 'edit']);
    Route::get('/view-student/{id}', [App\Http\Controllers\Admin\StudentController::class, 'view']);
    Route::get('/delete-student/{id}', [App\Http\Controllers\Admin\StudentController::class, 'delete']);
    Route::get('/block-student/{id}', [App\Http\Controllers\Admin\StudentController::class, 'block']);
    Route::get('/unblock-student/{id}', [App\Http\Controllers\Admin\StudentController::class, 'unblock']);

    //Subject
    Route::match(['get', 'post'], '/subjects', [App\Http\Controllers\Admin\SubjectController::class, 'create'])->name('admin_create_subject');
    Route::get('edit-subject/{id}', [App\Http\Controllers\Admin\SubjectController::class, 'edit']);
    Route::get('delete-subject/{id}', [App\Http\Controllers\Admin\SubjectController::class, 'delete']);

    //Classes
    Route::match(['get', 'post'], 'classes', [App\Http\Controllers\Admin\ClassesController::class, 'create'])->name('admin_create_class');
    Route::get('edit-class/{id}', [App\Http\Controllers\Admin\ClassesController::class, 'edit']);
    Route::get('view-class/{id}', [App\Http\Controllers\Admin\ClassesController::class, 'view']);
    Route::get('delete-class/{id}', [App\Http\Controllers\Admin\ClassesController::class, 'delete']);
});
