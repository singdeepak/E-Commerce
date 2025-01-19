<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function viewCategory(){
        $categories = Category::latest()->paginate(2);
        return view('admin.view_category',compact('categories'));
    }

    public function createCategory(){
        return view('admin.create_category');
    }

    public function storeCategory(Request $request){
        $validator = Validator::make($request->all(),[
            'category_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|unique:categories,category_name',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $category = Category::create([
                'category_name' => $request->input('category_name')
            ]);

            if($category){
                return redirect()->route('view.category')->with('message' , [
                'type' => 'success',
                'text' => 'Category created successfully.!'
                ]);
            }else{
                return redirect()->back()->with('message' , [
                    'type' => 'error',
                    'text' => 'Something went wrong! Please try again.'
                    ]);
            }
        }catch(Exception $e){
            Log::error('Message : '.$e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred! Please try again later.');
        }
    }

    public function editCategory(Request $request, string $id){
        $category = Category::find($id);
        if(!$category){
            return redirect()->back()->with('message' , [
                'type' => 'error',
                'text' => 'Category nof found'
            ]);
        }
        return view('admin.edit_category', compact('category'));

    }

    public function updateCategory(Request $request, string $id){
        $validator = Validator::make($request->all(),[
            'category_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|unique:categories,category_name',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        try{
            $category = Category::find($id);
            if(!$category){
                return redirect()->back()->with('message' , [
                    'type' => 'error',
                    'text' => 'Not found any category'
                ]);
            }
            $isUpdate = $category->update([
                'category_name' => $request->input('category_name')
            ]);

            if($isUpdate){
                return redirect()->route('view.category')->with('message' , [
                'type' => 'success',
                'text' => 'Category updated successfully.!'
                ]);
            }else{
                return redirect()->back()->with('message' , [
                    'type' => 'error',
                    'text' => 'Something went wrong! Please try again.'
                    ]);
            }
        }catch(Exception $e){
            Log::error('Message : '.$e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred! Please try again later.');
        }
    }


    public function destroyCategory(string $id){
        $category = Category::find($id);
        if(!$category){
            return redirect()->back()->with('message' , [
                'type' => 'error',
                'text' => 'Something went wrong! Please try again.'
                ]);
        }
        if($category->delete()){
            return redirect()->route('view.category')->with('message' , [
                'type' => 'success',
                'text' => 'Category deleted successfully.!'
                ]);
        }else{
            return redirect()->back()->with('message' , [
                'type' => 'error',
                'text' => 'Something went wrong! Please try again.'
                ]);
        }
    }
}
