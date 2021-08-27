<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Actions\Actionable;

class Page extends Model
{
    use Actionable;

    // Retrieve the model by the $slug instead of the default $id
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
