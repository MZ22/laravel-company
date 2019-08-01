<?php

namespace App\Http\Controllers;

use App\Posts;
use App\PostsCategories;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::all();

        return view('articles.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postscategories = PostsCategories::all();
        return view('articles.create',compact('postscategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageName = time().'-'.$request->file('image')->getClientOriginalName();

        $post = Posts::create(
            ['title' => $request->title,
             'description' => $request->description,
             'image' => '/storage/'.$request->file('image')->storeAs('files',$imageName),
             'idcat' => $request->idcat
            ]
        );
        return redirect('/admin/articles/'.$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $post)
    {
        $cat = PostsCategories::where('id', '=' ,$post->idcat)->first();
        $category = $cat->catname;
        
        return view('articles.show',compact('post','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $post)
    {
        $postscategories = PostsCategories::all();

        return view('articles.edit',compact('post','postscategories')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $post)
    {
        if(!empty($request->title)){
            $post->title = $request->title;
        }
        if(!empty($request->description)){
            $post->description = $request->description;
        }
        if(!empty($request->file('image'))) {
            $imageName = time().'-'.$request->file('image')->getClientOriginalName();
            $post->image = '/storage/'.$request->file('image')->storeAs('files',$imageName);
        }
        if(!empty($request->idcat)){
            $post->idcat = $request->idcat;
        }

        $post->save();
        $request->session()->flash('message', 'modification effectué!');
        return redirect('/admin/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $post, Request $request)
    {
        $post->delete();
        $request->session()->flash('message', 'Supression effectué!');
        return redirect('/admin/articles');
    }
}

