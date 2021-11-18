<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    public function sewa()
    {
        return $this->hasMany('App\Models\Sewa','sewa_id','id');
    }
}