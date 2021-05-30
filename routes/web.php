<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CourseCartController;

use App\Http\Controllers\UploadFileController;
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

// Route::get('/', [PagesController::class,'index']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Route::get('/courseCreation', [UploadFileController::class,'index']);

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'role:user', 'prefix' => 'user', 'as' => 'user.'], function() {
        Route::resource('lessons', \App\Http\Controllers\Users\LessonController::class);
    });
   Route::group(['middleware' => 'role:instructor', 'prefix' => 'instructor', 'as' => 'instructor.'], function() {
       Route::resource('courses', \App\Http\Controllers\Instructors\CourseController::class);
   });
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    });
});

Route::get('/demoshop',[CourseCartController::class, 'shop']);
Route::get('/cart', [CourseCartController::class, 'index']);
Route::post('/add', [CourseCartController::class, 'store']);
Route::post('/update', [CourseCartController::class,'update']);
Route::post('/remove', [CourseCartController::class,'remove']);
Route::post('/clear', [CourseCartController::class,'clear']);

