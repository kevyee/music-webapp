<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    public $timestamps = false;
    protected $table = 'playlist';
    protected $primaryKey = 'song_id';

    protected $fillable = [
        'plist_id',
        'plist_title',
        'user_id',
        'status',
        'created',
        'updated',
    ];

    public $rules = [
        'plist_title' => 'required|max:20',
    ];
}
