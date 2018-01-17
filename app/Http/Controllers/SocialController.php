<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialController extends Controller {

    public function index() {
//        $twits = Twitter::getUserTimeline(['screen_name' => 'thujohn', 'count' => 20, 'format' => 'json']);
//        dd($twits);
        return view('social.index');
    }

}
