<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index() {

        $data['students'] = Student::orderBy('id', 'DESC')->get();

        return view('admin.students.index')->with($data);

    }

    public function create() {

        return view('admin.students.create');

    }

    public function store(Request $request) {

        $data = $request->validate([

            'name' => 'nullable|string|max:50',
            'email' => 'required|email|max:50',
            'spec' => 'nullable|string|max:50',
        ]);


        Student::create($data);

        return redirect(route('admin.students.index'));

    }

    public function edit($id) {

        $data['student'] = Student::find($id);

        return view('admin.students.edit')->with($data);

    }

    public function update() {

        $data = request()->validate([
            'name' => 'nullable|string|max:50',
            'email' => 'required|email|max:50',
            'spec' => 'nullable|string|max:50',
        ]);

        Student::findOrFail(request()->id)->update($data);

        return redirect(route('admin.students.index'));

    }

    public function delete($id) {

       $student = Student::find($id);


       $student->delete();

        return redirect(route('admin.students.index'));
    }
}
