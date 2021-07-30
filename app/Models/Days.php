<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Days extends Model
{
    use HasFactory;
    
    public function log()
    {
        return $this->hasOne(Logbook::class, 'day_id')->withDefault();
    }
}
