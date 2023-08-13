<?php

namespace App\Http\Controllers;

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
}
