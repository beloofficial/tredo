<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Employee;

class TableController extends Controller
{

    public function show()
    {
        $departments = Department::get();
        $employees = Employee::get();
        
        return view('table.table',['departments'=>$departments, 'employees'=>$employees]);
    }
}
