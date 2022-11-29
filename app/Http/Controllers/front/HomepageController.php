<?php

namespace App\Http\Controllers\front;

use App\Models\Course;
use App\Models\Student;
use App\Models\Trainer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sitecontent;
use App\Models\Test;

class HomepageController extends Controller
{
    public function index() {

        $data['banner_content'] = Sitecontent::where('name', 'banner')->first();
        $data['feature_content'] = Sitecontent::where('name', 'feature')->first();
        $data['special_courses_content'] = Sitecontent::where('name', 'special_courses')->first();
        $data['testimonial_content'] = Sitecontent::where('name', 'testimonial')->first();

        $data['courses'] = Course::select('id', 'name', 'desc', 'small_desc', 'category_id', 'trainer_id', 'img', 'price')->orderBy('id', 'DESC')->take(3)->get();

        $data['courses_count'] = Course::count();
        $data['trainers_count'] = Trainer::count();
        $data['students_count'] = Student::count();

        $data['tests'] = Test::select('id', 'name', 'desc', 'img', 'spec')->get();



        return view('front.index')->with($data);
    }
}
