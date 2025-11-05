<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;

class EmployeeApiController extends Controller
{
    public function index()
    {
      
        $employees = Employee::with('company')->paginate(10);

        return response()->json([
            'status' => 'success',
            'data' => $employees
        ]);
    }
}

