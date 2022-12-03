<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

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
}
