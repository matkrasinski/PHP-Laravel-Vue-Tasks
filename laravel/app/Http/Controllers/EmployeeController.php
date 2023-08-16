<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;

class EmployeeController extends Controller
{
    public function index(): JsonResponse {
        $employees = Employee::all()->makeHidden(['created_at', 'updated_at']);
        return response()->json($employees);
    }

    public function store(EmployeeRequest $request): JsonResponse {
        $employee = Employee::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'salary' => $request->input('salary'),
            'job_title' => $request->input('job_title'),
            'hire_date' => now()
        ]);

        if ($employee) {
            return response()->json(['message' => 'Employee successfully created'], 201);
        }
        return response()->json(['message' => 'Not accepted input data'], 406);
    }

    public function destroy($employee): JsonResponse {
        Employee::destroy($employee);

        return response()->json(['message' => 'Employee successfully deleted']);
    }

}
