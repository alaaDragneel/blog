<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\category;

class categoryController extends Controller
{

    public function getCategories()
    {
         $categories = category::orderBy('created_at', 'DESC')->paginate(5);
         $categoriesCount = category::all();

         return view('admin.blog.categories', compact('categories', 'categoriesCount'));
    }


    public function postAddcategory(Request $request)
    {
         $this->validate($request, [
              'name' => 'required',
         ]);

         $category = new category();
         $category->name = $request->name;
         if($category->save()){
              return response()->json(['msg' => 'category creted'], 200);
         }else {
              return response()->json(['msg' => 'the datat didln\'t saved']. 422);
         }


    }

    public function postUpdatecategory(Request $request)
    {
        $category = category::find($request->id);
        $category->name = $request->name;
        $category->update();

        if($category->update()){
             return response()->json(['msg' => 'category updated'], 200);
        }

    }

    public function getDeletecategory($category_id)
    {
         $category = category::find($category_id);
         if(!$category){
              return redirect()->back()->with(['fail' => 'category Doesn\'t Exist']);
         }
         $category->delete();
         return redirect()->back()->with(['success' => 'category Successfully deleted']);
    }

}
