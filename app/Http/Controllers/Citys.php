<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\City;
use App\Http\Controllers\Controller;

class Citys extends Controller
{
    public function get($city = null) {
        if($city == 'all') {
            return response(City::get(['city_id', 'city_name']), 200);
        }
    }
}
