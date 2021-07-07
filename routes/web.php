<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\InstructorDashboardController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Users\UserCourseController;
use App\Http\Controllers\Users\UserQuizController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Instructor\InstructorController;
use App\Http\Controllers\Instructor\CourseCreationController;
use App\Http\Controllers\Users\EnrollCourseController;
use App\Http\Controllers\Instructor\QuizCreationController;
use App\Http\Controllers\Instructor\QuizQuestionController;
use App\Http\Controllers\Instructor\DashboardController;


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
        Route::view('/home','dashboard.user.home')->name('home'); 
           
        // dashboard page for user
       //  Route::view('/home','user.lessons.index')->name('index');  // define your own pages
        Route::get('/enroll',[EnrollCourseController::class,'enroll'])->name('courses');
        Route::get('/cart',[EnrollCourseController::class, 'cart'])->name('cart');
        Route::get('/add-to-cart/{id}',[EnrollCourseController::class, 'addToCart'])->name('addtoc');
        Route::delete('/cart/remove-from-cart',[EnrollCourseController::class, 'remove']);
        Route::get('/cart/checkout',[EnrollCourseController::class, 'checkOut'])->name('checkOut');
        Route::post('/cart/checkout',[EnrollCourseController::class, 'pay'])->name('pay');
        Route::get('/yourCourses',[UserCourseController::class,'viewCourse'])->name('yourCourses');
        Route::get('/courseVideos',[UserCourseController::class,'viewVideo'])->name('courseVideos');
        Route::get('/quiz',[UserQuizController::class,'index'])->name('courseQuiz');
        Route::post('/quiz',[UserQuizController::class,'quizStore'])->name('quizStore');
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
        Route::get('/instructors', [AdminController::class,'viewInstructor'])->name('instructor');
        Route::get('/users', [AdminController::class,'viewUser'])->name('users');
        Route::get('/courses', [AdminController::class,'viewCourse'])->name('courses');
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
        Route::get('/course-creation', [CourseCreationController::class, 'createCourse'])->name('createCourse');
        Route::post('/course-creation',[CourseCreationController::class, 'courseUpload'])->name('courseUpload'); 
        Route::get('/quiz-creation', [QuizCreationController::class,'create'])->name('createQuiz');
        Route::post('/quiz-creation', [QuizCreationController::class,'uploadQuiz'])->name('uploadQuiz');
        Route::get('/quiz-questions', [QuizQuestionController::class,'index'])->name('questions');
        Route::post('/quiz-questions', [QuizQuestionController::class, 'store'])->name('store');
        Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
        Route::post('logout',[InstructorController::class,'logout'])->name('logout');
    });
});
