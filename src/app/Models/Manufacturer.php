<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manufacturer extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Get all of the roles attached to the user.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
