<?php

// use App\Http\Controllers\front;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\CourseController;
use App\Http\Controllers\front\HomepageController;

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

Route::get('/', [HomepageController::class, 'index'])->name('front.homePage');

// Course Category Page
Route::get('/category/{id}', [CourseController::class, 'category'])->name('front.category');
// Single Course Page
Route::get('/category/{id}/course/{c_id}', [CourseController::class, 'showCourse'])->name('front.showCourse');
