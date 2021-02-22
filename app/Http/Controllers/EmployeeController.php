<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Models\UserId;
use Carbon\Carbon;
use App\Models\Employee;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::orderBy('id','DESC')->paginate(5);
        return View::make('employee.index',['employee' =>$employee]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|min:3|max:10',
            'last_name' => 'required|min:2|max:6',
            'gender' =>'required',
            'city' => 'required',
            'phone_number' => 'required|digits:10',
            'date_of_birth' => 'required',
            'email' => 'email|unique:employees',
            'password' => 'required',
        ],[
            'first_name.required' => 'Enter your FirstName',
            'first_name.min' => 'FirstName should be atleast :min characters',
            'first_name.max' => 'FirstName should not be greater than :max characters',
            'last_name.required' => 'Enter your LastName',
            'last_name.min' => 'LastName should be atleast :min characters',
            'last_name.max' => 'LastName should not be greater than :max characters',
            'gender.required' => 'Select your Gender',
            'city.required' => 'City is required',
            'phone_number.required' => 'Enter your phone number',
            'date_of_birth.required' => 'Fill your DOB',
            'email.required' => 'We need your email address',
            'password.required' => 'Please fill your password',
        ]);
        $employee = new Employee;
        $employee->first_name=$request->first_name;
        $employee->last_name=$request->last_name;
        $employee->gender=$request->gender;
        $employee->city=$request->city;
        $employee->phone_number=$request->phone_number;
        $employee->date_of_birth=$request->date_of_birth;
        $employee->email=$request->email;
        $employee->password=bcrypt($request->password);
        $employee->save();
        return redirect()->route('employees.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return View::make('employee.edit',['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required|min:3|max:10',
            'last_name' => 'required|min:2|max:6',
            'gender' =>'required',
            'city' => 'required',
            'phone_number' => 'required|digits:10',
            'date_of_birth' => 'required',
            'email' => 'email|unique:employees,email,'.$request->id,
            'password' => 'required',
        ],[
            'first_name.required' => 'Enter your FirstName',
            'first_name.min' => 'FirstName should be atleast :min characters',
            'first_name.max' => 'FirstName should not be greater than :max characters',
            'last_name.required' => 'Enter your LastName',
            'last_name.min' => 'LastName should be atleast :min characters',
            'last_name.max' => 'LastName should not be greater than :max characters',
            'gender.required' => 'Select your Gender',
            'city.required' => 'City is required',
            'phone_number.required' => 'Enter your phone number',
            'date_of_birth.required' => 'Fill your DOB',
            'email.required' => 'We need your email address',
            'password.required' => 'Please fill your password',
        ]);
        $employee = Employee::find($request->id);
        $employee->first_name=$request->first_name;
        $employee->last_name=$request->last_name;
        $employee->gender=$request->gender;
        $employee->city=$request->city;
        $employee->phone_number=$request->phone_number;
        $employee->date_of_birth=$request->date_of_birth;
        $employee->email=$request->email;
        $employee->password=bcrypt($request->password);
        $employee->update();
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        $employee = Employee::find($id);
        $employee->delete();
        // if(!empty($employee)){
        //     $employee->delete();
        // }
        return redirect()->route('employees.index')->with("success","Done");
    }
}
