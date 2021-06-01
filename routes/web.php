<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CourseCartController;
use App\Http\Controllers\InstaDashboard;
use App\Http\Controllers\InstructorController;
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

Route::get('/courseCreation', [InstructorController::class,'index'])->name('courseCreation');
Route::get('/InstaDashboard', [InstaDashboard::class,'index'])->name('idashboard');

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

Route::get('/demoshop',[CourseCartController::class, 'shop'])->name('dshop');
Route::get('/cart', [CourseCartController::class, 'index'])->name('cart');
Route::post('/add', [CourseCartController::class, 'store'])->name('addtoc');
Route::post('/update', [CourseCartController::class,'update'])->name('update');
Route::post('/remove', [CourseCartController::class,'remove'])->name('remove');
Route::post('/clear', [CourseCartController::class,'clear'])->name('clear');

