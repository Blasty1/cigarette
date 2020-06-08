<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    protected $fillable = [
        'id_industry','incasso','Pezzi_categorie'
    ];

    public function industries()
    {
        return $this->belongsTo('App\Industry', 'id_industry', 'id');
    }

}
