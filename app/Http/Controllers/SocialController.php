<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Thujohn\Twitter\Facades\Twitter;

class SocialController extends Controller {

    public function index() {
        return view('social.index');
    }

    public function filter() {
        $twits = Twitter::getUserTimeline(['screen_name' => 'wimarbueno', 'count' => 20, 'format' => 'json']);

        return $twits;
    }

}
