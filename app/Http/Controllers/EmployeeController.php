<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Employee;

class EmployeeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $employees =  Employee::with('departments')->get();
    
        return view('employees.index',['employees'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $departments = Department::get();

        return view('employees.create',['departments'=>$departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreEmployeeRequest $request)
    {   
        
        $validated =  $request->validated();
        
        $employee = Employee::create($validated);
        #many to many creating(one employee choose many departments)
        $departments = $validated['departments'];
        $departments = Department::find($departments);
        $employee->departments()->attach($departments);

        return redirect()->route('indexEmp');
    }

    
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Department $department
     * @return Response
     */
    public function edit(Employee $employee)
    {
        $departments = Department::get();

        return view('employees.edit',['employee'=>$employee, 'departments'=>$departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Department  $department
     * @param UpdateDepartmentRequest $request
     * @return Response
     */
    public function update(Employee $employee, UpdateEmployeeRequest $request)
    {
        $validated =  $request->validated();

        $employee->update($validated);
        $departments = $validated['departments'];
        $departments = Department::find($departments);
        $employee->departments()->sync($departments);

        return redirect()->route('indexEmp');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $department
     * @return Response
     */
    public function destroy($employee)
    {
        Employee::destroy($employee);
        
        return redirect()->route('indexEmp');
    }

}
