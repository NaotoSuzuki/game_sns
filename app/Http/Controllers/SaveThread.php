<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Components\SaveThreadComponent;
use App\Models\Components\GetPostsComponent;
use App\Models\Components\SavePostsComponent;
use App\Models\Components\GetThreadIdComponent;


class SaveThread extends Controller
{
    public function saveThread( Request $thread_build_itmes, SaveThreadComponent $save){

        $thread_title = $thread_build_itmes->thread_title;
        $game_id = $thread_build_itmes->game_id;
        $thread_device_id = $thread_build_itmes->thread_device_id;
        $note = $thread_build_itmes->note;
        $save->ThreadSave($thread_title, $game_id, $thread_device_id, $note);
        return view('buildThread');
    }

}
