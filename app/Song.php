<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    public $timestamps = false;
    protected $table = 'song';
    protected $primaryKey = 'song_id';

    protected $fillable = [
        'song_id', 
        'gnre_id', 
        'song_file_name', 
        'song_file_image', 
        'total_stream_count', 
        'user_id', 
        'song_status_id',  
        'created', 
        'updated',
    ];

    public $rules = [
        'gnre_id' => 'required', 
        'song_file_name' => 'required', 
        'song_file_image' => 'required',
        'gnre_id' => 'required',
    ];
}
