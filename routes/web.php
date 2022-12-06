<?php

// use App\Http\Controllers\front;

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\front\CourseController;
use App\Http\Controllers\admin\TrainerController;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\front\MessageController;
use App\Http\Controllers\admin\CategoryController;
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

        // Categories CRUD
        Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::post('/categories/update', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::get('/categories/delete/{id}', [CategoryController::class, 'delete'])->name('admin.categories.delete');

        // Trainers CRUD
        Route::get('/trainers', [TrainerController::class, 'index'])->name('admin.trainers.index');
        Route::get('/trainers/create', [TrainerController::class, 'create'])->name('admin.trainers.create');
        Route::post('/trainers/store', [TrainerController::class, 'store'])->name('admin.trainers.store');
        Route::get('/trainers/edit/{id}', [TrainerController::class, 'edit'])->name('admin.trainers.edit');
        Route::post('/trainers/update', [TrainerController::class, 'update'])->name('admin.trainers.update');
        Route::get('/trainers/delete/{id}', [TrainerController::class, 'delete'])->name('admin.trainers.delete');


    });

    Route::get('/login', [AuthController::class, 'login'])->name('admin.login')->middleware('testguest');
    Route::post('/login', [AuthController::class, 'doLogin'])->name('admin.doLogin');

});















