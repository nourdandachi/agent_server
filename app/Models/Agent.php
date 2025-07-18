<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Prunable;

class Agent extends Model
{
    use HasFactory;

    use Prunable;
 
    public function prunable(): Builder
    {
        return static::where('created_at', '<=', now()->subMonth());
    }
}
