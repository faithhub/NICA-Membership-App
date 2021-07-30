<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weeks extends Model
{
    use HasFactory;

    public function log()
    {
        return $this->hasOne(Logbook::class, 'week_id')->withDefault();
    }
}
