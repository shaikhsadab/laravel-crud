<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $employees = Employee::paginate(10);
        return view ('employee.index',[
            "employees" => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());


        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'mobile' => 'required|digits_between:10,15',
            'address' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'hobby' => 'required|array|min:1',
            'hobby.*' => 'string',
            'file' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validate image files
        ]);

        $data = $request->all();

        if ($request->hasFile('file')) {
            $imageName = time() . '.' . $request->file('file')->extension();
            $request->file('file')->move(public_path('product'), $imageName);
            $data['file'] = 'product/' . $imageName; // Save relative path
        }

        $data['hobby'] = implode(',', $request->hobby);

        Employee::create($data);

        return redirect('/employee')->with('value', 'New Employee Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(employee $employee)
    {
        return view ('employee.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(employee $employee)
    {
        return view ('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, employee $employee)
    {

        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            // 'email' => 'required|email|unique:employees,email'.$employee->id,
            'email' => 'required|email|unique:employees,email,' . $employee->id, // Corrected rule
            'mobile' => 'required|digits_between:10,15',
            'address' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'hobby' => 'required|array|min:1',
            'hobby.*' => 'string',
            'file' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validate image files
        ]);

        $data = $request->all();

        if ($request->hasFile('file')) {
            $imageName = time() . '.' . $request->file('file')->extension();
            $request->file('file')->move(public_path('product'), $imageName);
            $data['file'] = 'product/' . $imageName;
        }

        $data['hobby'] = implode(',', $request->hobby);

        $employee->update($data);

        return redirect('/employee')->with('value', 'Employee Record updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(employee $employee)
    {
        $employee->delete();
        return redirect('/employee')->with('value', 'Employee Record deleted');
    }
}
