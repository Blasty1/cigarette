<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    protected $fillable = [
        'id_industry','id_product','quantità','incasso','id_user'
    ];

    public function industries()
    {
        return $this->belongsTo('App\Industry', 'id_industry', 'id');
    }

    public function products()
    {
        return $this->belongsTo('App\Product', 'id_product', 'id');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
