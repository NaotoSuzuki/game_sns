<?php
    namespace App\Models\Components;

    use DB;

    class SaveReplyComponent{
        public function saveReplyComponent($post_id,$thread_id,$usrName,$reply,$reply_at){

        DB::table('replies')->insert([
                [
                "post_id"=>$post_id,
                "thread_id"=>$thread_id,
                "usrName"=>$usrName,
                "reply"=>$reply,
                "reply_at"=>$reply_at
                ]
        ]);

    }
        public function saveRelyToReplyComponent($post_id,$thread_id,$usrName,$reply,$reply_at,$replyId_at){

        DB::table('replies')->insert([
                [
                "post_id"=>$post_id,
                "thread_id"=>$thread_id,
                "usrName"=>$usrName,
                "reply"=>$reply,
                "reply_at"=>$reply_at,
                "replyId_at"=>$replyId_at
                ]
        ]);

    }
}
