<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    public $timestamps = false;
    protected $table = 'song';
    protected $primaryKey = 'song_id';
}
