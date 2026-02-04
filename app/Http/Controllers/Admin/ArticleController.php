<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller{
    
    public function manage_articles(Request $request){
        $title = "Blog";
        $blogs = array();
        return view('admin.articles.manage_article',compact('title','blogs'));
    }

    public function add_articles(Request $request){
        $blogs = array();
        return view('admin.articles.add_articles_form',compact('blogs'));
    }
}
