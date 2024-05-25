<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $casts = [
        'date_acquisition' => 'datetime:d/m/Y',
    ];

    protected $fillable = ['model', 'year', 'km_acquisition', 'date_acquisition', 'renavam'];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
