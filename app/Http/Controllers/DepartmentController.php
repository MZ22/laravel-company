<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use App\Employee;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        return view('departments.index',compact('departments',$departments));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate
        /*$request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
        ]);*/
        
        $department = Department::create(['dprtname' => $request->dprtname]);
        return redirect('/admin/departments/'.$department->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return view('departments.show',compact('department'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function employeesbydprt($department_id)
    {
        
        $employees = Employee::where('iddprt', '=' ,$department_id)->get();
        $department = Department::where('id', '=' ,$department_id)->first();

        return view('departments.employees',compact('employees','department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('departments.edit',compact('department')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        //Validate
        /*$request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
        ]);*/
        
        $department->dprtname = $request->dprtname;
        $department->save();
        $request->session()->flash('message', 'Modification effectué!');
        return redirect('/admin/departments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Department $department)
    {
        $department->delete();
        $request->session()->flash('message', 'Supression effectué!');
        return redirect('departments'); 
}
