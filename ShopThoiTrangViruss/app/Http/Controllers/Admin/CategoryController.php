<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function indexCategory(){
        $cate = Category::paginate(2);
        return view('admin.category.categoryIndex', ['categories' => $cate]);
    }

    public function indexcreateCategory(){
        return view('admin.category.categoryCreateIndex');
    }
    
    public function createCategory(Request $request)
    {
        $data = $request->all();

        Category::create([
            'name_category' => $data['name']
        ]);

        return redirect()->route('category.createindex');
    }

    public function indexupdateCategory(Request $request)
    {
        $cate_id = $request->get('id');
        $cate = Category::where('id_category', $cate_id)->first();      

        return view('admin.category.categoryUpdateIndex', ['category' => $cate]);
    }

    public function updateCategory(Request $request)
    {
        $input = $request->all();
        $input_id = $input['id'];
        $cate = Category::where('id_category', $input_id)->first();
        $cate->name_category = $input['name'];

        $cate->save();
        return redirect('category');
    }

    public function deleteCategory(Request $request)
    {
        $cate_id = $request->get('id');
        $cate = Category::destroy($cate_id);
        return redirect('category')->withSuccess('You have Signed-in');
    }
}
