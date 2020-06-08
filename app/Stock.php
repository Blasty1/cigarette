<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'id_industry','id_product','quantità'
    ];

    public function industries(){
       return  $this->belongsTo('\App\Industry','id_industry','id');
    }

    public function products(){
       return  $this->belongsTo('\App\Product','id_product','id');
    }

    
}
