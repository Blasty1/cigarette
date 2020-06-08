<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $fillable = [
        'name'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'id', 'name');
    }

    public function stocks()
    {
        return $this->hasMany('App\Stock', 'id', 'id_industry');
    }

    public function sells()
    {
        return $this->hasMany('App\Sell', 'id', 'id_se');
    }


}
