<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Thujohn\Twitter\Facades\Twitter;

class SocialController extends Controller {

    public function index() {
        return view('social.index');
    }

    public function filterByUser(Request $request) {
        $screen_name = ($request->input('screen_name')) ? $request->input('screen_name') : 'bbva';
        $tweets = Twitter::getUserTimeline(['screen_name' => $screen_name, 'count' => 30, 'format' => 'json']);
        return $tweets;
    }

    public function search(Request $request) {
        $search_tweets = $request->input('search_tweets');
        $tweets = Twitter::getSearch(['count' => 4, 'format' => 'json', "q" => $search_tweets]);
        return $tweets;
    }

}
