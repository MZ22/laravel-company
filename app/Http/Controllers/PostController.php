<?php

namespace App\Http\Controllers;

use App\Posts;
use App\PostsCategories;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function index(Posts $post)
    {
        $cat = PostsCategories::where('id', '=' ,$post->idcat)->first();
        $category = $cat->catname;
        
        return view('post',compact('post','category'));
    }
}
