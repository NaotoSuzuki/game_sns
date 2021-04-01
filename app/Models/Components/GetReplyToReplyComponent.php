<?php
    namespace App\Models\Components;

    use DB;

    class GetReplyToReplyComponent{
        public function getReplyToReplyComponent($thread_id,$reply_id){

            $replyToReply_array = DB::table('replies')
                ->where('replies.thread_id','=',$thread_id)
                ->where('replies.replyId_at','=',$reply_id)
                ->get();
            return $replyToReply_array;

    }

    public function getReplyToReplyShowComponent($thread_id){

        $replyToReply_array = DB::table('replies')
            ->where('replies.thread_id','=',$thread_id)
            ->get();
        return $replyToReply_array;

}
}
