<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::all();
        return view('blogs/index',compact('blogs'));
    }
    public function create(){
        $categories = Category::all();
        return view('blogs/create',compact('categories'));
    }
    public function store(Request $request){
        $blog = new Blog();
        $categories = Category::all();
        $blog->name = $request->name;
        $blog->description = $request->description;
        $blog->category_id = $_POST['category_id'];
        $blog->save();
        return view('blogs/create',compact('categories'));
    }
    public function delete($blogID){
        $blog = Blog::find($blogID);
        return view('blogs.delete',compact('blog'));
    }
    public function destroy(Request $request,$blogID){
        $blog = Blog::find($blogID);
        $blog->delete();
        return redirect()->route('blogs.index');
    }
    public function edit($blogID){
        $blog = Blog::find($blogID);
        $categories  = Category::all();
        return view('blogs.edit',compact('categories','blog'));
    }
    public function update(Request $request, $blogID){
        $blog = Blog::find($blogID);
        $categories = Category::all();
        $blog->name = $request->name;
        $blog->description = $request->description;
        $blog->category_id = $_POST['category_id'];
        $blog->save();
        return view('blogs.edit',compact('categories','blog'));
    }
}
