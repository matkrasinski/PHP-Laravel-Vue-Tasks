<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(): JsonResponse {
        $cars = Car::all()->makeHidden(['created_at', 'updated_at']);
        return response()->json($cars);
    }

    public function store(CarRequest $request): JsonResponse {
        $car = Car::create([
            'brand' => $request->input('brand'),
            'model' => $request->input('model'),
            'reg_number' => $request->input('reg_number'),
        ]);

        if ($car) {
            return response()->json(['message' => 'Car successfully created'], 201);
        }
        return response()->json(['message' => 'Not accepted input data'], 406);
    }

    public function destroy($car): JsonResponse {
        Car::destroy($car);

        return response()->json(['message' => 'Car successfully deleted']);
    }

}


