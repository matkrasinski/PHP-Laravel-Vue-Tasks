<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;

class CarCustomerController extends Controller
{
    public function assignCar($customerId, $carId): JsonResponse {
        $customer = Customer::findOrFail($customerId);
        $car = Car::findOrFail($carId);

        $customer->assignCar($car);
        return response()->json(['message' => 'Car assigned to customer successfully']);
    }

    public function releaseCar($customerId, $carId): JsonResponse {
        $customer = Customer::findOrFail($customerId);
        $car = Car::findOrFail($carId);

        $customer->releaseCar($car);
        return response()->json(['message' => 'Car released from customer successfully']);
    }

    public function returnCar($customerId, $carId): JsonResponse {
        $customer = Customer::findOrFail($customerId);
        $car = Car::findOrFail($carId);

        $customer->returnCar($car);
        return response()->json(['message' => 'Customer has returned car']);
    }

    public function isUsingCar($customerId, $carId): JsonResponse {
        $customer = Customer::findOrFail($customerId);
        $car = Car::findOrFail($carId);

        $isUsing = $customer->isUsingCar($car);
        return response()->json(['customer_id' => $customer['id'], 'car_id' => $car['id'],  'is_using' => $isUsing]);
    }
}
