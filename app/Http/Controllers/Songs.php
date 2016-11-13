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
use Aws\S3\S3Client;

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
        // return response($song_file, 200);

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

        // $s3 = Storage::disk('s3');
        // $s3->put($songFileName, file_get_contents($song_file), 'public');
        $s3 = new S3Client([
            'version'     => 'latest',
            'region'      => 'ap-southeast-2',
            'credentials' => [
                'key'    => 'AKIAIL6SAFIAFHEAWG4A',
                'secret' => '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',
            ],
        ]);
        
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
            $s3->upload('rhythmiq', $songFileName, fopen($song_file->getRealPath(), 'rb'), 'public-read');
            return response('Upload Complete!', 200);
       
        } else {
            if($saved) {
                return response('Please upload again.', 403);
            }
        }
    }
}
