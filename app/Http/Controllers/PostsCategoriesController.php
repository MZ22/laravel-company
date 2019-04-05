<?php

namespace App\Http\Controllers;

use App\PostsCategories;
 
use Illuminate\Http\Request;

class PostsCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postsCategories = PostsCategories::all();

        return view('articlescategories.index',compact('postsCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articlescategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $postsCategorie = PostsCategories::create(
            ['catname' => $request->catname,
            ]
        );
        return redirect('/admin/categories/'.$postsCategorie->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PostsCategories  $category
     * @return \Illuminate\Http\Response
     */
    public function show(PostsCategories $category)
    {
        return view('articlescategories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PostsCategories  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(PostsCategories $category)
    {
        return view('articlescategories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PostsCategories  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostsCategories $category)
    {
        if(!empty($request->catname)){
            $category->catname = $request->catname;
        }

        $category->save();
        $request->session()->flash('message', 'modification effectué!');
        return redirect('/admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PostsCategories  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostsCategories $category, Request $request)
    {
        $category->delete();
        $request->session()->flash('message', 'Supression effectué!');
        return redirect('/admin/categories');
    }
}
