<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    protected $fillable = [
        'name'
    ];

    public function book()
    {
        return $this->hasOne('App\Book','writer_id');
    }
}
