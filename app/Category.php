<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function products()
    {
        return $this->hasOne('App\Product', 'id', 'id_category');
    }
}
