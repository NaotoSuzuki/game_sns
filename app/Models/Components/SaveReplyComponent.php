<?php
    namespace App\Models\Components;

    use DB;

    class SaveReplyComponent{
        public function saveReplyComponent($post_id,$thread_id,$reply){

        DB::table('replies')->insert([
                [
                "post_id"=>$post_id,
                "thread_id"=>$thread_id,
                "reply"=>$reply
                ]
        ]);

    }
}
