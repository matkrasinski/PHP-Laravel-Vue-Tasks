<?php

namespace App\Http\Middleware;

use App\Models\Customer;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCustomerExists
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
        $customerId = $request->route('customerId');

        if (!in_array($request->route()->getActionMethod(), $this->except)) {
            if (!Customer::where('id', $customerId)->exists()) {
                return response()->json(['message' => 'Customer not found'], 404);
            }
        }

        return $next($request);
    }
}
