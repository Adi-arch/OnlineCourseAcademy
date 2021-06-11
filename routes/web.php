<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\InstructorDashboardController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Instructor\InstructorController;
use App\Http\Controllers\Instructor\CourseCreationController;
use App\Http\Controllers\Users\EnrollCourseController;

// use App\Http\Controllers\CourseCartController;
// use App\Http\Controllers\InstaDashboard;
// use App\Http\Controllers\InstructorController;
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
    return view('welcome');
});


Route::get('/course-creation', [CourseCreationController::class, 'createCourse']);
Route::post('/course-creation',[CourseCreationController::class, 'courseUpload'])->name('courseUpload');
Route::get('/enroll',[EnrollCourseController::class, 'enroll']);
Route::get('/cart',[EnrollCourseController::class, 'cart']);
Route::get('/add-to-cart/{id}',[EnrollCourseController::class, 'addToCart']);
Route::delete('remove-from-cart',[EnrollCourseController::class, 'remove']);
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('user')->name('user.')->group(function(){

    Route::middleware(['guest:web', 'PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.user.login')->name('login');
        Route::view('/register','dashboard.user.register')->name('register');

        Route::post('/create',[UserController::class,'create'])->name('create');
        Route::post('/check',[UserController::class,'check'])->name('check');

    });

    Route::middleware(['auth:web', 'PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.user.home')->name('home');  // dashboard page for user
       //  Route::view('/home','user.lessons.index')->name('index');  // define your own pages
        Route::post('/logout',[UserController::class,'logout'])->name('logout');
    });
});

Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.admin.login')->name('login');
        Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.admin.home')->name('home');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
    });

});

Route::prefix('instructor')->name('instructor.')->group(function(){

    Route::middleware(['guest:instructor', 'PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.instructor.login')->name('login');
        Route::view('/register','dashboard.instructor.register')->name('register');
        Route::post('/create',[InstructorController::class,'create'])->name('create');
        Route::post('/check',[InstructorController::class,'check'])->name('check');
    });

    Route::middleware(['auth:instructor', 'PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.instructor.home')->name('home');
        Route::post('logout',[InstructorController::class,'logout'])->name('logout');
    });
});