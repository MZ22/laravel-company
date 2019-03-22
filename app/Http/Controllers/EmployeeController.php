<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Department;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();

        foreach ($employees as $employee) {
            $dpt = Department::where('id', '=' ,$employee->iddprt)->first();
            $department[$employee->id] = $dpt->dprtname;
        }

        return view('employees.index',compact('employees','department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('employees.create',compact('departments'));
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

        $request->validate([
            'cv' => 'required|max:1024',
        ]);

        /*$fileName = "CV".time().'.'.$request()->cv->getClientOriginalExtension();
        dd($fileName);*/
        $fileName = time().'-'.$request->file('cv')->getClientOriginalName();

        //dd('/storage/'.$request->file('cv')->storeAs('files',$fileName));
        
        $employee = Employee::create(
            ['name' => $request->name,
             'birthdate' => $request->birthdate,
             'workdate' => $request->workdate,
             'iddprt' => $request->iddprt,
             'email' => $request->email,
             'phone' => $request->phone,
             'cv' => '/storage/'.$request->file('cv')->storeAs('files',$fileName),
             'jobtitle' => $request->jobtitle,
             'salary' => $request->salary
            ]
        );
        return redirect('/employees/'.$employee->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $dpt = Department::where('id', '=' ,$employee->iddprt)->first();
        $department = $dpt->dprtname;
        
        return view('employees.show',compact('employee','department'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $departments = Department::all();

        return view('employees.edit',compact('employee','departments')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //Validate
        /*$request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
        ]);*/
        
        $employee->name = $request->name;
        $employee->birthdate = $request->birthdate;
        $employee->workdate = $request->workdate;
        $employee->iddprt = $request->iddprt;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->cv = $request->cv;
        $employee->jobtitle = $request->jobtitle;
        $employee->salary = $request->salary;


        $employee->save();
        $request->session()->flash('message', 'modification effectué!');
        return redirect('employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Employee $employee)
    {
        $employee->delete();
        $request->session()->flash('message', 'Supression effectué!');
        return redirect('employees');
    }
}
