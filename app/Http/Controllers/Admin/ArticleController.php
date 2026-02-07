<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Models\Admin\BlogCategory;
use App\Models\BlogComment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArticleController extends Controller{

    public function manage_category(){
        $title = "Blog Category";
        $allcat = BlogCategory::all();
        return view('admin.articles.manage_article_category',compact('allcat','title'));
    }

    public function add_article_category(Request $request){
        if($request->isMethod('post')){

                $request->validate([
                    'cat_name' => 'required|string|max:1000',
                    'status' => 'required|in:0,1',
                ]);

                BlogCategory::create([
                    'cat_name' => $request->cat_name,
                    'status'   => $request->status,
                ]);

                return redirect()->back()->with('success', 'Blog category added successfully!');

        }else{
            return view('admin.articles.artical_category');
        }
    }

    public function edit_blog_category($id){
        $catData = BlogCategory::where('id',$id)->first();
        return view('admin.articles.edit_artical_category',compact('catData'));
    }

    public function update_article_category(Request $request,$id){
        if($request->isMethod('put')){
            $request->validate([
                'cat_name' => 'required|string|max:1000',
                'status' => 'required|in:0,1',
            ]);
            $blogcat  = BlogCategory::findOrFail($id);
            $blogcat->cat_name = $request->cat_name;
            $blogcat->status   = $request->status ?? 1;
            $blogcat->save();
            return redirect('admin/manage-category')->with('success', 'Blog Category updated successfully');
        }
    }
    
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

    public function blog_details($slug){
        $blog = Blog::where('slug', $slug)->where('status', 1)->firstOrFail(); // only active blogs
        $latestblogs = Blog::where('status', 1)->where('created_at', '>=', now()->subDays(7))->orderByDesc('created_at')->get();
        $categories = Blog::where('status', 1)->select('category', DB::raw('COUNT(*) as total'))->groupBy('category')->orderByDesc('total')->get();
        $tags = Blog::where('status', 1)->selectRaw('tags, COUNT(*) as total')->groupBy('tags')->orderByDesc('total')->get();
        $comments = BlogComment::where('blog_id', $blog->id)->whereNull('parent_id')->where('status', 1)->with(['user', 'replies.user'])->latest()->get();
        $totalComments = BlogComment::where('blog_id', $blog->id)->where('status', 1)->count();
        $title = 'Blog';
        return view('admin.articles.blog_detail', compact('blog','latestblogs','categories','tags','comments','totalComments'));
    }

    public function category($category){
        $title = "Category - ".$category;
        $blogs = Blog::where('status', 1)->where('category', $category)->latest()->paginate(12);
        return view('admin.articles.manage_article',compact('title','blogs'));
    }

    public function tags($tags){
        $title = "Tags - ".$tags;
        $blogs = Blog::where('status', 1)->where('tags', $tags)->latest()->paginate(12);
        return view('admin.articles.manage_article',compact('title','blogs'));
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
}
