<?php

namespace App\Http\Controllers\front;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function category($id) {
        $data['category'] = Category::findOrFail($id);
        $data['courses'] = Course::where('category_id', $id)->paginate(6);

        return view('front.courses.category')->with($data);

    }

    public function showCourse($id, $c_id) {
        $data['course'] = Course::findOrFail($c_id);

        return view('front.courses.show')->with($data);
    }
}
