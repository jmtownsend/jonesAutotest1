<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carImage extends Model
{
    // Table Name
    protected $table = 'carImages';
    //Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = false;

    public function carImage(){
        return $this->belongsTo('App\Post');
    }
}
