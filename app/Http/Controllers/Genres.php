<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Genre;
use App\Http\Controllers\Controller;

class genres extends Controller
{
    public function get($genre = null) {
        if($genre == 'all') {
            return response(genre::get(['gnre_id', 'gnre_name']), 200);
        }
    }
}
