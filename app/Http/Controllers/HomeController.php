<?php

namespace App\Http\Controllers;

use App\Posts;
use App\PostsCategories;
use App\Department;
use App\Employee;
use App\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$employees = Employee::take(4)->get();
		
		$posts = Posts::take(3)->get();

        $testimonials = Testimonial::take(5)->get();

		foreach ($posts as $post){
			$cat = PostsCategories::where('id', '=' ,$post->idcat)->first();
			$category[$post->id] = $cat;	
		}

		foreach ($employees as $employee){
			$department = Department::where('id', '=' ,$employee->iddprt)->first();
			$departments[$employee->id] = $department->	dprtname;	
		}

		return view('home',compact('employees','departments','posts','category','testimonials'));
    }
}
