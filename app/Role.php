<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'Role','description'
        ];

    public function users()
    {
        return $this->belongsTo('App\User', 'id', 'id_role');
    }
}
