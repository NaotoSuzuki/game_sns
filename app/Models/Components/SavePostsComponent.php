<?php
    namespace App\Models\Components;

    use DB;

    class SavePostsComponent{
        public function savePostsComponent($thread_id,$game_id,$purpose,$usrName,$user_platform_id,$comment){

        DB::table('posts')->insert([
                [
                "thread_id"=>$thread_id,
                "usrName"=>$usrName,
                "game_id"=>$game_id,
                "purpose"=>$purpose,
                "user_platform_id_1"=>$user_platform_id,
                "comment"=>$comment
                ]
        ]);

    }
}
