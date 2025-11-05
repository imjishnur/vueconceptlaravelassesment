<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of employees.
     */
    public function index()
    {
        $employees = Employee::with('company')->latest()->paginate(10);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new employee.
     */
    public function create()
    {
        $companies = Company::pluck('name', 'id');
        return view('employees.create', compact('companies'));
    }

    /**
     * Store a newly created employee in storage.
     */
    public function store(EmployeeRequest $request)
    {
        Employee::create($request->validated());

        return redirect()->route('employees.index')->with('success', 'Employee created successfully!');
    }

    /**
     * Show the form for editing the specified employee.
     */
    public function edit(Employee $employee)
    {
        $companies = Company::pluck('name', 'id');
        return view('employees.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified employee in storage.
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }

    /**
     * Remove the specified employee from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }
}
