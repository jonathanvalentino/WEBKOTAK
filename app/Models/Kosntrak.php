<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kosntrak extends Model
{
    use HasFactory;
    protected $table = "kosntrak";
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
        return $this->hasMany('App\Models\User','user_id','id');
    }
    public function sewa()
    {
        return $this->hasMany('App\Models\Sewa','sewa_id','id');
         return $this->belongsTo('App\Models\Sewa','kosntrak_id','id');
    }
}
