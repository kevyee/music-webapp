<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Song;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\KValidator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class Songs extends Controller
{
    protected $song;
    protected $validator;

    public function __construct(Song $song) {
        $this->song = $song;
        $this->validator = new KValidator;
        $this->validator->rules = $this->song->rules;
    }

    public function getUserSongs() {
        if(Auth::check()) {
            $songs = \DB::table('song')
                        ->select('song_id','gnre_name', 'song_title AS title','song_file_name')
                        ->join('genre', 'song.gnre_id', '=', 'genre.gnre_id')
                        ->join('user', 'song.user_id', '=', 'user.user_id')
                        ->where('song.user_id', Auth::user()->user_id)
                        ->get();
            return response($songs, 200);
            // return response(Song::where('user_id', Auth::user()->user_id)->get(), 200);
        }
        else{
            return response('Access Denied', 403);
        }
    }

    public function store(Request $request) {
        
        if(is_null(Input::file('file'))){
            $this->validator->addError('Please include the song file.');
            return response($this->validator->errors(), 403);
        }
        
        $song_file = Input::file('file');
        $file_limit = 5000;
        $songFileType = $song_file->getClientOriginalExtension();
        // return response($songFileType, 200);

        if (File::size($song_file) / 1000 > $file_limit) {
            $this->validator->addError('File size must not exceed 5MB.');
            return response($this->validator->errors(), 403);
        }        

        if($songFileType != 'mp3') {
            $this->validator->addError('Song file type must be mp3.');
            return response($this->validator->errors(), 403);
        }

        $songFileName = $song_file->getClientOriginalName();
        $songFileName = time() . '.' . $song_file->getClientOriginalExtension();

        if (!$this->validator->validate($request->all()))
            return response($this->validator->errors(), 403);
        $this->song->song_title = $request->input('song_title');
        $this->song->gnre_id = $request->input('gnre_id');
        $this->song->song_file_name = $songFileName;
        $this->song->total_stream_count = 0;
        $this->song->user_id = Auth::user()->user_id;
        $this->song->song_status_id  = 1; //change for admin review
        $this->song->created = date('Y-m-d h:i:s');
        $this->song->updated = date('Y-m-d h:i:s');
        $saved = $this->song->save();

        if($saved) {
            $s3 = Storage::disk('s3');
            $s3->put($songFileName, Input::file('file'), 'public');
        }
        return response('Upload Complete!', 200);
    }
}
