<?php
    namespace App\Models\Components;

    use DB;

    class GetPostsComponent{
        public function getPostsComponent($thread_id){

            $posts_array = DB::table('posts')
                ->join('threads','posts.thread_id','=','threads.id')
                ->select('posts.id','posts.purpose','posts.usrName','posts.user_platform_id_1','posts.comment','posts.comment','posts.created_at')
                ->where('posts.thread_id','=',$thread_id)
                ->get();
            return $posts_array;

    }
}
