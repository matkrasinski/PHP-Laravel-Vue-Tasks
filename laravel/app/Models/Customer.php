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
        $this->cars()->attach($car, ['is_using' => true, 'start_time' => now()]);
    }

    public function releaseCar(Car $car): void {
        $this->cars()->updateExistingPivot($car->id, ['is_using' => false, 'end_time' => now()]);
    }

    public function isUsingCar(Car $car) {
        return $this->cars->contains(function ($carItem) use ($car) {
            return $carItem->id === $car['id'] && $carItem->pivot->is_using;
        });
    }
}
