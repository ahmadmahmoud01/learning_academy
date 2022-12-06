<?php

namespace App\Http\Controllers\admin;

use App\Models\Trainer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
// use Image;
// use Intervention\Image\Image;

class TrainerController extends Controller
{
    public function index() {

        $data['trainers'] = Trainer::orderBy('id', 'DESC')->get();

        return view('admin.trainers.index')->with($data);

    }

    public function create() {

        return view('admin.trainers.create');

    }

    public function store(Request $request) {

        $data = $request->validate([
            'name' => 'required|string|max:50',
            'phone' => 'nullable|string|max:20',
            'spec' => 'required|string|max:50',
            'img' => 'required|Image|mimes:jpg,jpeg,png'
        ]);


        $new_name = $data['img']->hashName();

        Image::make($data['img'])->resize(50, 50)->save(public_path('uploads/trainers/' . $new_name));

        // dd($new_name);
        $data['img'] = $new_name;

        Trainer::create($data);

        return redirect(route('admin.trainers.index'));

    }

    public function edit($id) {

        $data['trainer'] = Trainer::find($id);

        return view('admin.trainers.edit')->with($data);

    }

    public function update(Request $request) {

        $data = $request->validate([
            'name' => 'required|string|max:50',
            'phone' => 'nullable|string|max:20',
            'spec' => 'required|string|max:50',
            'img' => 'nullable|Image|mimes:jpg,jpeg,png'
        ]);

        $old_name = Trainer::findOrFail($request->id)->img;

        if($request->hasFile('img')) {

            Storage::disk('uploads')->delete('trainers/' . $old_name);

            $new_name = $data['img']->hashName();

            Image::make($data['img'])->resize(50, 50)->save(public_path('uploads/trainers/' . $new_name));

            // dd($new_name);
            $data['img'] = $new_name;

        } else {
            $data['img'] = $old_name;
        }


        Trainer::findOrFail($request->id)->update($data);

        return redirect(route('admin.trainers.index'));


    }

    public function delete($id) {

        $trainer = Trainer::find($id);

        Storage::disk('uploads')->delete('trainers/' . $trainer->img);

        $trainer->delete();

        return redirect(route('admin.trainers.index'));
    }
}
