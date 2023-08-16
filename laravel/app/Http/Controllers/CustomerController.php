<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Http\Requests\CustomerRequest;
use App\Models\Car;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(): JsonResponse {
        $customers = Customer::all()->makeHidden(['created_at', 'updated_at']);
        return response()->json($customers);
    }

    public function show($customerId): JsonResponse {
        $customerInfo = Customer::with(['employee', 'orders' => function ($query) {
            $query->orderBy('created_at', 'desc')->take(5);
        }])->find($customerId);

        $customerInfo->makeHidden(['employee_id', 'created_at', 'updated_at']);
        $customerInfo['employee']->makeHidden(['created_at', 'updated_at']);

        foreach ($customerInfo->orders as $order) {
            $order->makeHidden(['customer_id', 'created_at', 'updated_at']);
        }

        return response()->json($customerInfo);
    }

    public function store(CustomerRequest $request): JsonResponse {
        $customer = Customer::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'employee_id' => $request->input('employee_id'),
        ]);

        if ($customer) {
            return response()->json(['message' => 'Customer successfully created'], 201);
        }
        return response()->json(['message' => 'Not accepted input data'], 406);
    }

    public function destroy($customer): JsonResponse {
        Customer::destroy($customer);

        return response()->json(['message' => 'Customer successfully deleted']);
    }
}
