<?php

// use App\Http\Controllers\front;

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\CourseController;
// use App\Http\Controllers\front\CourseController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\TrainerController;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\front\MessageController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\front\HomepageController;
// use App\Http\Controllers\admin\CourseController;

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

        Route::prefix('/categories')->group(function() {

            // Categories CRUD
            Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('admin.categories.create');
            Route::post('/store', [CategoryController::class, 'store'])->name('admin.categories.store');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
            Route::post('/update', [CategoryController::class, 'update'])->name('admin.categories.update');
            Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('admin.categories.delete');
        });

        Route::prefix('/trainers')->group(function() {

            // Trainers CRUD
            Route::get('/', [TrainerController::class, 'index'])->name('admin.trainers.index');
            Route::get('/create', [TrainerController::class, 'create'])->name('admin.trainers.create');
            Route::post('/store', [TrainerController::class, 'store'])->name('admin.trainers.store');
            Route::get('/edit/{id}', [TrainerController::class, 'edit'])->name('admin.trainers.edit');
            Route::post('/update', [TrainerController::class, 'update'])->name('admin.trainers.update');
            Route::get('/delete/{id}', [TrainerController::class, 'delete'])->name('admin.trainers.delete');

        });

        Route::prefix('/courses')->group(function() {

            // courses CRUD
            Route::get('/', [CourseController::class, 'index'])->name('admin.courses.index');
            Route::get('/create', [CourseController::class, 'create'])->name('admin.courses.create');
            Route::post('/store', [CourseController::class, 'store'])->name('admin.courses.store');
            Route::get('/edit/{id}', [CourseController::class, 'edit'])->name('admin.courses.edit');
            Route::post('/update', [CourseController::class, 'update'])->name('admin.courses.update');
            Route::get('/delete/{id}', [CourseController::class, 'delete'])->name('admin.courses.delete');

        });

        Route::prefix('/students')->group(function() {

            // Students CRUD
            Route::get('/', [StudentController::class, 'index'])->name('admin.students.index');
            Route::get('/create', [StudentController::class, 'create'])->name('admin.students.create');
            Route::post('/store', [StudentController::class, 'store'])->name('admin.students.store');
            Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('admin.students.edit');
            Route::post('/update', [StudentController::class, 'update'])->name('admin.students.update');
            Route::get('/delete/{id}', [StudentController::class, 'delete'])->name('admin.students.delete');

        });

    });

    Route::prefix('/login')->group(function() {
        // login process
        Route::get('/', [AuthController::class, 'login'])->name('admin.login')->middleware('testguest');
        Route::post('/', [AuthController::class, 'doLogin'])->name('admin.doLogin');
    });


});















