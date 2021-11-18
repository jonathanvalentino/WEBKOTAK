<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    public function konstrak()
    {
        return $this->belongsTo('App\konstrak','konstrak_id','id');
    }
    public function sewa()
    {
        return $this->belongsTo('App\Models\Sewa','sewa_id','id');
    }
}