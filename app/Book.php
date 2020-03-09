<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name','image','description','category_id', 'publication_id', 'writer_id'];


    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function publication(){
        return $this->belongsTo('App\Publication');
    }
    public function writer(){
        return $this->belongsTo('App\Writer');
    }



}
