<?php

namespace App\Http\Controllers\admin;
use App\Models\Course;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CourseController extends Controller
{
    public function index() {

        $data['courses'] = Course::orderBy('id', 'DESC')->get();

        return view('admin.courses.index')->with($data);

    }

    public function create() {

        $data['courses'] = Course::orderBy('id', 'DESC')->get();
        $data['categories'] = Category::get();
        $data['trainers'] = Trainer::get();


        return view('admin.courses.create')->with($data);

    }

    public function store(Request $request) {

        $data = $request->validate([
            'name' => 'required|string|max:50',
            'small_desc' => 'nullable|string|max:200',
            'desc' => 'required|string',
            'price' => 'nullable|integer|min:100',
            'img' => 'required|Image|mimes:jpg,jpeg,png',
            'category_id' => 'required|exists:categories,id',
            'trainer_id' => 'required|exists:trainers,id'
        ]);


        $new_name = $data['img']->hashName();

        Image::make($data['img'])->resize(50, 50)->save(public_path('uploads/courses/' . $new_name));

        // dd($new_name);
        $data['img'] = $new_name;

        Course::create($data);

        return redirect(route('admin.courses.index'));

    }

    public function edit($id) {

        $data['course'] = Course::find($id);

        $data['categories'] = Category::get();
        $data['trainers'] = Trainer::get();

        return view('admin.courses.edit')->with($data);

    }

    public function update(Request $request) {

        $data = $request->validate([
            'name' => 'required|string|max:50',
            'small_desc' => 'required|string|max:200',
            'desc' => 'required|string',
            'price' => 'required|integer',
            'img' => 'nullable|Image|mimes:jpg,jpeg,png',
            'category_id' => 'required|exists:categories,id',
            'trainer_id' => 'required|exists:trainers,id'
        ]);

        $old_name = Course::findOrFail($request->id)->img;

        if($request->hasFile('img')) {

            Storage::disk('uploads')->delete('courses/' . $old_name);

            $new_name = $data['img']->hashName();

            Image::make($data['img'])->resize(50, 50)->save(public_path('uploads/courses/' . $new_name));

            // dd($new_name);
            $data['img'] = $new_name;

        } else {
            $data['img'] = $old_name;
        }


        Course::findOrFail($request->id)->update($data);

        return redirect(route('admin.courses.index'));


    }

    public function delete($id) {

        $course = Course::find($id);

        Storage::disk('uploads')->delete('courses/' . $course->img);

        $course->delete();

        return redirect(route('admin.courses.index'));
    }
}
