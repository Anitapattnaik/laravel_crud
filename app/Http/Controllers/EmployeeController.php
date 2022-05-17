<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Validator, Input, Redirect; 
use Illuminate\Support\Facades\Storage;

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
        return view('pages.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employeeValidator = array(
            'name' => 'required|max:8',
            'email' => 'required|email|unique:employees',
            'phone' => 'required|unique:employees|max:10|min:10',
          //  'designation' => 'required|exists:employees',
      
        );

        $messages = [
            'name.required' => 'Please enter the :attribute.',
            'email.required' => 'Please enter the :attribute.',
            'email.email' => 'Please enter the valid :attribute.',
            'email.unique' => 'Please enter the unique :attribute.',
            'phone.required' => 'Please enter the :attribute number.',
            'phone.min' => ':attribute unique must be 10 digits.',
            'phone.max' => ':attribute unique must not be exceed 10 digits.',
            'phone.unique' => ':attribute number already exist.',
            'designation.required' => 'Please enter the :attribute.', 
            'designation.exists' => ':attribute already exist.',
        ];
        $validator = Validator::make(Input::all(), $employeeValidator, $messages);
           
      if( $validator->fails())
      {
            return Redirect::back()
            ->withErrors($validator) 
            ->withInput()->with('Failed to add employee details.');

            $input = input::all();
      }
      else 
      { 
        $employee = new Employee;
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->designation = $request->input('designation');

        $employee->save();
        return Redirect::to('/employees')->withInput()->with('success', 'Employee added successfully.');
        
       
        
      }
        
        


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
       return view('pages.employees.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->designation = $request->input('designation');
        $employee->status = $request->input('status') == true ? '1' : '0';
        $employee->update();

        return redirect('/employees')->with('success', 'Employee updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $employee = Employee::find($id);
       $employee->delete();
       return redirect('/employees')->with('error', 'Employee deleted successfully');


    }
}
