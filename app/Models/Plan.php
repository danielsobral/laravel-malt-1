<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'short_description',
        'price',
        'cod'
    ];

    public function signatures()
    {
        return $this->hasMany(Signature::class);
    }

    public function name(): Attribute
    {
        return Attribute::make(
            get: fn($name) => ucfirst($name)
        );
    }

    public function cod(): Attribute
    {
        return Attribute::make(
            get: fn($cod) => strtoupper($cod),
            set: fn($cod) => strtolower($cod)
        );
    }

    public function fullname(): Attribute
    {
        return Attribute::make(
            get: fn($name, $attributes) => strtoupper($attributes['name']) . '_' . strtoupper($attributes['cod'])
        );
    }
}
