<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{ 
    public $timestamps = false;
    protected $table = 'city';
    protected $primaryKey = 'city_id';

    protected $fillable = [
       'city',
       'city_name',
       'status',
       'created',
       'updated'
    ];
}
