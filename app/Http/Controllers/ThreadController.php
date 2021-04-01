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
use App\Models\Components\GetRepliesComponent;
use App\Models\Components\SaveReplyComponent;

use JavaScript;


class ThreadController extends Controller
{
    private static function getThreadDatas($request){
        $game_id = $request->game_id;
        $thread_title = $request->thread_title;
        $thread_device_name = $request->thread_device_name;

        return [$game_id, $thread_title, $thread_device_name];
    }


    public function indexThread(GetThreadsComponent $getThreads,GetRanksComponent $getRanks){

        $thread_array = $getThreads->getThreadsComponent();
        $ranks_array = $getRanks->getRanksComponent();

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

    public function showThread(Request $request, GetThreadIdComponent $getThreadId,GetPostsComponent $getPosts, GetRepliesComponent $getReplies){
        list($game_id, $thread_title, $thread_device_name) = self::getThreadDatas($request);

        $usrName = '';
        if (!empty($request->usrName)) {
         $request->session()->put('usrName', $request->input('usrName'));
         $usrName = $request->session()->get('usrName');
         }

        $thread_id = $getThreadId->getThreadIdComponent($thread_title);
        $posts_array = $getPosts->getPostsComponent($thread_id);
        $replies_array = $getReplies->getRepliesComponent($thread_id);


        return view('threadDetail',compact('thread_title','game_id','thread_device_name','posts_array','thread_id','replies_array','usrName'));
    }

    public function savePost(Request $request,GetThreadIdComponent $getThreadId,SavePostsComponent $savePosts,GetPostsComponent $getPosts){
        // dd($request);
        list($game_id, $thread_title, $thread_device_name) = self::getThreadDatas($request);
        $usrName = $request->usrName;
        $purpose = $request->purpose;
        $user_platform_id = $request->user_platform_id;
        $comment = $request->comment;
        $thread_id = $getThreadId->getThreadIdComponent($thread_title);
        $savePosts->savePostsComponent($thread_id,$game_id,$purpose,$usrName,$user_platform_id,$comment);
        $posts_array = $getPosts->getPostsComponent($thread_id);
        // return redirect()->route('threadsShow',['title' => $thread_title],['title' => $thread_title],['title' => $thread_title]);
        return view('threadDetail',compact('thread_title','game_id','thread_device_name','posts_array','usrName','thread_id'));
    }


    public function postReply(Request $request, SaveReplyComponent $saveReply,GetPostsComponent $getPosts, GetRepliesComponent $getReplies){
        dd($request);

        list($game_id, $thread_title, $thread_device_name) = self::getThreadDatas($request);
        $usrName = $request->usrName;
        $thread_id = $request->thread_id;
        $posts_array = $getPosts->getPostsComponent($thread_id);
        $post_id = $request->post_id;
        $reply = $request->reply;
        $reply_at = $request->replied_user;

        if(!empty($reply_at)){
            $saveReply->saveReplyComponent($post_id,$thread_id,$usrName,$reply,$reply_at);
            // replies_idを軸とした返信返信欄
            //返信返信だけをまとめた配列を作る


        }

        $saveReply->saveReplyComponent($post_id,$thread_id,$usrName,$reply,$reply_at);
        $replies_array = $getReplies->getRepliesComponent($thread_id);

        return view('threadDetail',compact('thread_title','game_id','thread_device_name','posts_array','thread_id','replies_array','usrName'));
    }



}
