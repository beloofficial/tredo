<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;

class DepartmentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       $departments =  Department::get();

       return view('departments.index',['departments'=>$departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreDepartmentRequest $request)
    {   
     
       $validated =  $request->validated();
      
       $department = Department::create($validated);
       return redirect()->route('indexDep');
    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Department $department
     * @return Response
     */
    public function edit(Department $department)
    {
        return view('departments.edit',['department'=>$department]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Department  $department
     * @param UpdateDepartmentRequest $request
     * @return Response
     */
    public function update(Department $department,UpdateDepartmentRequest $request)
    {
       $validated =  $request->validated();
       $department->update($validated);
       return redirect()->route('indexDep');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $department
     * @return Response
     */
    public function destroy($department)
    {
        $employees = Department::find($department)->employees()->exists();
        if(!$employees)
        {
            Department::destroy($department);
            return redirect()->route('indexDep');
        }
        else
        {
            return redirect()->route('indexDep')->withErrors(['destroy'=>'You can not delete it, because it has relations with employees. First of all delete all relational employees']);
        }
        
    }

}
