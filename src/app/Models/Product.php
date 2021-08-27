<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Retrieve the model by the $slug instead of the default $id
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
}
