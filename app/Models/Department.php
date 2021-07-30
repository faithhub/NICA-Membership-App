<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    public function create($data)
    {
        $save = new self;
        $save->name = $data['name'];
        $save->school_id = $data['school_id'];
        $save->save();
    }
    public function school()
    {
        return $this->belongsTo(Schools::class, 'school_id');
    }    
    
    public function user()
    {
        return $this->hasOne(User::class, 'department_id');
    }
}
