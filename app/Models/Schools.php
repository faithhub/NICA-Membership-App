<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schools extends Model
{
    use HasFactory;

    public function create($data)
    {
        $save = new self;
        $save->name = $data['name'];
        $save->save();
    }

    public function department()
    {
        return $this->hasOne(Department::class, 'school_id');
    }

    
    public function user()
    {
        return $this->hasOne(User::class, 'school_id');
    }
}
