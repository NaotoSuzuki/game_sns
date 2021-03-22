<?php
    namespace App\Models\Components;

    use DB;

    class GetRanksComponent{
        public function getRanksComponent(){

            // $ranks_array = DB::table('posts')
            //  ->select(DB::raw('count(*) as thread_id'))
            //  ->groupBy('game_id')
            //  ->get();
            $ranks_array = DB::table('posts')
            ->join('games','posts.game_id','=','games.id')
            ->select(['game_id','games.game_title',DB::raw('count(*) as count, game_id')])
            ->groupBy('game_id')
            ->orderByRaw('count DESC')
            ->get();

            return $ranks_array;

    }
}
