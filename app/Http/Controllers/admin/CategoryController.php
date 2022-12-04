<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index() {

        $data['categories'] = Category::select('id', 'name')->orderBy('id', 'DESC')->get();

        return view('admin.categories.index')->with($data);

    }

    public function create() {

        return view('admin.categories.create');

    }

    public function store(Request $request) {

        $data = $request->validate([
            'name' => 'required|string|max:50'
        ]);

        Category::create($data);

        return redirect(route('admin.categories.index'));

    }

    public function edit($id) {

        $data['category'] = Category::find($id);

        return view('admin.categories.edit')->with($data);

    }

    public function update(Request $request) {

        $category = Category::find($request->id);

        $data = $request->validate([
            'name' => 'required|string|max:50'
        ]);

        $category->update($data);

        return redirect(route('admin.categories.index'));


    }

    public function delete($id) {

        Category::find($id)->delete();

        return redirect(route('admin.categories.index'));
    }
}
