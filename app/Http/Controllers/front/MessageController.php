<?php

namespace App\Http\Controllers\front;

use App\Models\Message;
use App\Models\Student;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function newsletter() {

        $data = request()->validate([
            'email' => 'required|email'
        ]);

        Newsletter::create($data);

        // ajax
        return back();

    }

    // contact form

    public function contact() {
        $data = request()->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'subject' => 'nullable|string',
            'message' => 'required|string'
        ]);

        Message::create($data);

        return back();

    }

    public function enroll() {
        $data = request()->validate([
            'name' =>'nullable|string|max:191',
            'email' => 'required|email|max:191',
            'spec' => 'nullable|string|max:191',
            'course_id' => 'required|exists:courses,id'
        ]);

        $student = Student::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'spec' => $data['spec']
        ]);

        $student_id = $student->id;

        DB::table('course_student')->insert([
            'course_id' => $data['course_id'],
            'student_id' => $student_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        return back();
    }
}
