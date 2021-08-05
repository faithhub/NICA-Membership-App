<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Payment extends Model
{
    use HasFactory;
    
    public function create($data, $prove)
    {
        $save = new self;
        $save->user_id = Auth::user()->id;
        $save->plan_id = $data['plan_id'];
        $save->payer_name = $data['payer_name'];
        $save->trans_id = $data['trans_id'];
        $save->prove = $prove;
        $save->save();
    }

    public function plan()
    {
        return $this->hasOne(Subscription::class, 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
