<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Components\GetThreadsComponent;
use App\Models\Components\GetRanksComponent;
use App\Models\Components\SaveThreadComponent;
use App\Models\Components\GetPostsComponent;
use App\Models\Components\SavePostsComponent;
use App\Models\Components\GetThreadIdComponent;


class ThreadController extends Controller
{
    public function indexThread(GetThreadsComponent $getThreads,GetRanksComponent $getRanks){

        $thread_array = $getThreads->getThreadsComponent();
        $ranks_array = $getRanks->getRanksComponent();
        // ランキング表示に必要な情報。
        //game idと紐づく登場を数える
        //foreachでgame_idの種類だけ回して、game_idをkeyとした配列で撮ってくる。
        //そしてphpの関数で標準にする
        //それよりもmｙｓｑｌの結果の時点でランク化させておく。grou_byが使える？

        return view('threadsIndex',compact('thread_array','ranks_array'));
    }



    public function saveThread(Request $thread_build_itmes, SaveThread $save){
        // dd($thread_build_itmes);
        $this->validate($thread_build_itmes, [
           'thread_title'  => 'required',
           'thread_device_id' => 'required',
           'note' => 'required',
       ]);
        $thread_title = $thread_build_itmes->thread_title;
        $thread_device_id = $thread_build_itmes->thread_device_id;
        $note = $thread_build_itmes->note;
        $save->saveThread($thread_title, $thread_device_id, $note);
        return view('buildThread');
    }

    public function showThread(Request $thread_data, GetThreadIdComponent $getThreadId,GetPostsComponent $getPosts){
        $thread_title = $thread_data->thread_title;
        $game_id = $thread_data->game_id;
        $thread_device_name = $thread_data->thread_device_name;
        $thread_id = $getThreadId->getThreadIdComponent($thread_title);
        $posts_array = $getPosts->getPostsComponent($thread_id);

        return view('threadDetail',compact('thread_title','game_id','thread_device_name','posts_array'));
    }

    public function savePost(Request $request,GetThreadIdComponent $getThreadId,SavePostsComponent $savePosts,GetPostsComponent $getPosts){
        $purpose = $request->purpose;
        $thread_title = $request->thread_title;
        $game_id = $request->game_id;
        $thread_device_name = $request->thread_device_name;
        $user_platform_id = $request->user_platform_id;
        $comment = $request->comment;
        $thread_id = $getThreadId->getThreadIdComponent($thread_title);
        // dd($thread_id);

        $savePosts->savePostsComponent($thread_id,$game_id,$purpose,$user_platform_id,$comment);
        $posts_array = $getPosts->getPostsComponent($thread_id);
        // return redirect()->route('threadsShow',['title' => $thread_title],['title' => $thread_title],['title' => $thread_title]);
        return view('threadDetail',compact('thread_title','game_id','thread_device_name','posts_array'));
    }

}
