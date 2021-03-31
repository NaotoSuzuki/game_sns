<?php
    namespace App\Models\Components;

    use DB;

    class GetRepliesComponent{
        public function getRepliesComponent($thread_id){

            $replies_array = DB::table('replies')
                ->where('replies.thread_id','=',$thread_id)
                ->get();
            return $replies_array;

    }
}
