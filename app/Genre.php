<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{ 
    public $timestamps = false;
    protected $table = 'genre';
    protected $primaryKey = 'gnre_id';

    protected $fillable = [
       'gnre_id',
       'gnre_name',
       'status',
       'created',
       'updated'
    ];
}
