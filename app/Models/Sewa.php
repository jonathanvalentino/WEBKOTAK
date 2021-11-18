<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory;
    protected $table = "sewa";
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    public function kosntrak()
    {
        return $this->belongsTo('App\Models\Kosntrak','sewa_id','id');
        return $this->hasMany('App\Models\Kosntrak','kosntrak_id','id');
    }
}