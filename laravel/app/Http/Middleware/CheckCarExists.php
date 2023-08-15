<?php

namespace App\Http\Middleware;

use App\Models\Car;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCarExists
{
    protected array $except = [
        'index'
    ];

    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $carId = $request->route('carId');

        if (!in_array($request->route()->getActionMethod(), $this->except)) {
            if (!Car::where('id', $carId)->exists()) {
                return response()->json(['message' => 'Car not found'], 404);
            }
        }

        return $next($request);
    }
}
