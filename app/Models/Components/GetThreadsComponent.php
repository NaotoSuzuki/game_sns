<?php
    namespace App\Models\Components;

    use DB;

    class GetThreadsComponent{
        public function getThreadsComponent(){

            $thread_array = DB::table('threads')
                ->join('thread_devices','threads.thread_device_id','=','thread_devices.id')
                ->select('threads.thread_title','threads.game_id','thread_devices.thread_device_name','threads.note')
                ->get();

            return $thread_array;

    }
}
