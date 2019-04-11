<?php

namespace App\Http\Controllers;

use App\PostsCategories;
use Illuminate\Http\Request;
use App\Posts;


class PostCategoriesController extends Controller
{
 
    /**
     * Display the specified resource.
     *
     * @param  \App\PostsCategories  $category_id
     * @return \Illuminate\Http\Response
     */
    public function postsbycats($category_id)
    {
        $posts = Posts::where('idcat', '=' ,$category_id)->get();
        $category = PostsCategories::where('id', '=' ,$category_id)->first();

        return view('postsbycats',compact('posts','category'));
    }
}
