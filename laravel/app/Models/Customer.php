<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
}
