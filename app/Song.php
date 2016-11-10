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
        'song_title',
        'gnre_id',
        'song_file_name',
        'total_stream_count',
        'user_id',
        'song_status_id',
        'created',
        'updated',
    ];

    public $rules = [
        'song_title' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/|max:30',
        'gnre_id' => 'required', 
        // 'song_file_image' => 'required|max:5000',
    ];
}
