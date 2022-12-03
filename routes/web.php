<?php

// use App\Http\Controllers\front;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\front\CourseController;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\front\MessageController;
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
// Contact Page
Route::get('/contact', [ContactController::class, 'index'])->name('front.contact');

//Newsletter Form
Route::post('/message/newsletter', [MessageController::class, 'newsletter'])->name('front.message.newsletter');

// Contact form
Route::post('/message/contact', [MessageController::class, 'contact'])->name('front.message.contact');

// Enroll Form
Route::post('message/enroll', [MessageController::class, 'enroll'])->name('front.message.enroll');

// Admin Dashboard

Route::prefix('/dashboard')->group(function(){
    Route::middleware('adminAuth')->group(function() {

        Route::get('/', [HomeController::class, 'home'])->name('admin.home');
        Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    });

    Route::get('/login', [AuthController::class, 'login'])->name('admin.login')->middleware('testguest');
    Route::post('/login', [AuthController::class, 'doLogin'])->name('admin.doLogin');

});















