<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;

class VoteController extends Controller
{ 
    public static function showAll() {
        $votes = Vote::all();
        return view('index', ['votes' => $votes]);
    }
    public static function get_by_id($id) {
        $vote = Vote::find((int)$id);
        return view('show_vote', ['vote' => $vote]);
    }
    public static function increasePositive($id){
        $vote = Vote::find((int)$id);
        $vote->positive++;
        $vote->save();
        return back();
    }
    public static function increaseNegative($id){
        $vote = Vote::find((int)$id);
        $vote->negative++;
        $vote->save();
        return back();
    }
    public static function create(Request $request) {
        $vote = new Vote;
        $vote->title = $request->title;
        $vote->text = $request->text;
        $vote->positive = 0;
        $vote->negative = 0;
        $vote->save();
        return redirect('/');
    }
    //
}
