<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    public function create_new($data)
    {
        $save = new self;
        $save->name = $data['name'];
        $save->price = $data['price'];
        $save->save();
    }
}
