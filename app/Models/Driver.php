<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Driver extends Model
{
    use HasFactory;

    protected $casts = [
        'date_of_birth' => 'datetime:d/m/Y',
    ];

    protected $fillable = ['name', 'date_of_birth', 'cnh'];

    public function trips(): BelongsToMany
    {
        return $this->belongsToMany(Trip::class, 'driver_trip');
    }
}
