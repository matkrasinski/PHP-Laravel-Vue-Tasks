<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'employee_id'
    ];

    public function employee(): BelongsTo {
        return $this->belongsTo(Employee::class);
    }

    public function orders(): HasMany {
        return $this->hasMany(Order::class);
    }

    public function cars(): BelongsToMany {
        return $this->belongsToMany(Car::class, 'car_customer')
            ->withPivot('is_using', 'start_time', 'end_time')
            ->withTimestamps();
    }

    public function assignCar(Car $car): void {
        $isCarAlreadyUsed = Customer::whereHas('cars', function ($query) use ($car) {
            $query->where('car_id', $car['id']);
            $query->where('is_using', 1);
        })->exists();
        if (!$isCarAlreadyUsed) {
            $this->cars()->syncWithoutDetaching([$car['id'] => ['is_using' => true, 'start_time' => now(), 'end_time' => null]]);
        }
    }

    public function releaseCar(Car $car): void {
        $this->cars()->updateExistingPivot($car['id'], ['is_using' => false, 'end_time' => now()]);
    }

    public function returnCar(Car $car): void {
        $this->cars()->detach($car['id']);
    }
    public function isUsingCar(Car $car) {
        return $this->cars->contains(function ($carItem) use ($car) {
            return $carItem->id === $car['id'] && $carItem->pivot->is_using;
        });
    }
}
