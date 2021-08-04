<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;


    public function create($data, $file)
    {
        $save = new self;
        $save->title = $data['title'];
        $save->content = $data['content'];
        $save->file = $file;
        $save->save();
    }
}
