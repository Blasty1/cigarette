<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable = [
        'name', 'prezzo', 'codice','Grammi/Pezzi','img','id_category'
    ];

    public function stocks()
    {
        return $this->hasOne('App\Stock', 'id', 'id_product');
    }

    public function categories()
    {
        return $this->belongsTo('App\Categories', 'id_category', 'id');
    }

    public function sells()
    {
        return $this->hasMany('App\Sell', 'id', 'id_product');
    }
    
  
}
