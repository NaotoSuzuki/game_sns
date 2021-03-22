<?php
    namespace App\Models\Components;

    use DB;

    class GetThreadIdComponent{
        public function getThreadIdComponent($thread_title){
            
            $thread_id_array  = DB::table('threads')
                ->select('threads.id')
                ->where('threads.thread_title','=',$thread_title)
                ->get();
            $thread_id_array_p = $thread_id_array->pluck("id");
            $thread_id = $thread_id_array_p[0];

            return $thread_id;


    }
}
