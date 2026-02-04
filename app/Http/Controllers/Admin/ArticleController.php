<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArticleController extends Controller{
    
    public function manage_articles(Request $request){
        $title = "Blog";
        $blogs = Blog::all();
        return view('admin.articles.manage_article',compact('title','blogs'));
    }

    public function add_articles(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'title' => 'required|string|max:255',
                'category' => 'required|string|max:255',
                'tags' => 'nullable|string|max:100',
                'description' => 'required',
                'bgimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:500',
            ]);

            $blog = new Blog();
            $blog->user_id     = auth()->id(); // logged in user
            $blog->title       = $request->title;
            $blog->slug        = Str::slug($request->title) . '-' . Str::random(6);
            $blog->author      = auth()->user()->name;
            $blog->category    = $request->category;
            $blog->tags        = $request->tags;
            $blog->description = $request->description;
            $blog->authimage   = auth()->user()->profile_img;
            $blog->status      = 1; // active / published

            // Background image upload
            if($request->hasFile('bgimage')){
                $blog->bgimage = $request->file('bgimage')->store('uploads/blogs', 'public');
            }
            $blog->save();

            return redirect()->back()->with('success', 'Blog added successfully!');

        }else{
            $blogs = array();
            return view('admin.articles.add_articles_form',compact('blogs'));
        }


        
    }

    public function blog_detail($id){

    }
}
