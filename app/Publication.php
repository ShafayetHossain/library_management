<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $fillable = [
        'name'
    ];


    public function book()
    {
        return $this->hasOne('App\Book','publication_id');
    }

}
