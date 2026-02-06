<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class BlogController extends Controller{
    // All blogs
    public function blog(Request $request){
        $blogs = Blog::with('user')->where('status', 1)->orderByDesc('created_at')->get();
        $title = 'Blog';
        return view('blog.bloglist',['blogs'=>$blogs,'title'=>$title]);
    }
    // Category wise blogs
    public function category($category){
        $blogs = Blog::where('status', 1)->where('category', $category)->latest()->paginate(12);
        $title = 'Category: ' . $category;
        return view('blog.bloglist', compact('blogs', 'title'));
    }
    // Tag wise blogs
    public function tag($tag){
        $blogs = Blog::where('status', 1)->where('tags', 'LIKE', "%$tag%")->latest()->paginate(12);
        $title = 'Tag: ' . $tag;
        return view('blog.bloglist', compact('blogs', 'title'));
    }
    // Blog Detail
    public function blog_detail($slug){
        $blog = Blog::where('slug', $slug)->where('status', 1)->firstOrFail(); // only active blogs
        $latestblogs = Blog::where('status', 1)->where('created_at', '>=', now()->subDays(7))->orderByDesc('created_at')->get();
        $categories = Blog::where('status', 1)->select('category', DB::raw('COUNT(*) as total'))->groupBy('category')->orderByDesc('total')->get();
        $tags = Blog::where('status', 1)->selectRaw('tags, COUNT(*) as total')->groupBy('tags')->orderByDesc('total')->get();
        $comments = BlogComment::where('blog_id', $blog->id)->whereNull('parent_id')->where('status', 1)->with(['user', 'replies.user'])->latest()->get();
        $totalComments = BlogComment::where('blog_id', $blog->id)->where('status', 1)->count();
        $title = 'Blog';
        
        return view('front.blog_detail', compact('blog','latestblogs','categories','tags','comments','totalComments'));
    }
    
    // Add Blog
    public function add_blog(Request $request){
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

            return redirect()->route('blog')->with('success', 'Blog added successfully!');

        }else{
            $blogs = Blog::where('user_id',auth()->id())->orderByDesc('created_at')->get();
            return view('blog.blogForm', compact('blogs'));
        }
    }

    public function addComment(Request $request, $blogId){
        $request->validate([
            'comment' => 'required|string|max:1000',
            'parent_id' => 'nullable|exists:blog_comments,id',
        ]);

        BlogComment::create([
            'blog_id' => $blogId,
            'user_id' => auth()->id(), // optional if guest comments allowed
            'comment' => $request->comment,
            'parent_id' => $request->parent_id, // reply parent
            'status' => 1, // active
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }

    public function store(Request $request)
    {
        BlogComment::create([
            'blog_id'   => $request->blog_id,
            'user_id'   => auth()->id(),
            'comment'   => $request->comment,
            'parent_id' => $request->parent_id,
            'status'    => 1,
        ]);

        return back();
    }

}