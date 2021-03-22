<?php
    namespace App\Models\Components;

    use DB;

    class SaveThreadComponent{
        public function ThreadSave($thread_title,$game_id,$thread_device_id,$note){

        DB::table('threads')->insert([
                [
                "thread_title"=>$thread_title,
                "game_title"=>$game_id,
                "thread_device_id"=>$thread_device_id,
                "note"=>$note
                ]
        ]);

    }
}
