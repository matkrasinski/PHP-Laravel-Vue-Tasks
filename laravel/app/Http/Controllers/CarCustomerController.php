<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Customer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class CarCustomerController extends Controller
{
    public function assignCar($customerId, $carId): JsonResponse {
        list($customer, $car, $response) = $this->getCustomerWithCar($customerId, $carId);

        if ($response) {
            return $response;
        }

        $customer->assignCar($car);
        return response()->json(['message' => 'Car assigned to customer successfully']);
    }

    public function releaseCar($customerId, $carId): JsonResponse {
        list($customer, $car, $response) = $this->getCustomerWithCar($customerId, $carId);

        if ($response) {
            return $response;
        }

        $customer->releaseCar($car);
        return response()->json(['message' => 'Car released from customer successfully']);
    }

    public function returnCar($customerId, $carId): JsonResponse {
        list($customer, $car, $response) = $this->getCustomerWithCar($customerId, $carId);

        if ($response) {
            return $response;
        }

        $customer->returnCar($car);

        return response()->json(['message' => 'Customer has returned car']);
    }

    public function isUsingCar($customerId, $carId): JsonResponse {
        list($customer, $car, $response) = $this->getCustomerWithCar($customerId, $carId);

        if ($response) {
            return $response;
        }

        $isUsing = $customer->isUsingCar($car);

        return response()->json(['customer_id' => $customer['id'], 'car_id' => $car['id'],  'is_using' => $isUsing]);
    }

    private function getCustomerWithCar($customerId, $carId): array {
        try {
            $customer = Customer::findOrFail($customerId);
        } catch (ModelNotFoundException) {
            return [null, null, response()->json(['message' => 'Customer with given ID does not exist'], 404)];
        }

        try {
            $car = Car::findOrFail($carId);
        } catch (ModelNotFoundException) {
            return [null, null, response()->json(['message' => 'Car with given ID does not exist'], 404)];
        }

        return [$customer, $car, null];
    }

}
