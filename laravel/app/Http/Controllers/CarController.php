<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(): JsonResponse {
        $cars = Car::all()->makeHidden(['created_at', 'updated_at']);
        return response()->json($cars);
    }
}
