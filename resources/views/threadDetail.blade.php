@extends('layouts.app')

@section('title', 'game_sns')

@section('content')

    スレッドタイトル：{{$thread_title}}
    <br>
    <a href="/threads_index">スレッド一覧に戻る</a>
        <form action = "{{url('/build_thread/post/save')}}" method="post" autocomplete="off">
            @csrf
            対象機器:{{$thread_device_name}}
            <br>

            目的：
            <select name='purpose'>
                <option value='フレンド募集' selected>フレンド募集</option>
                <option value='練習'>練習</option>
                <option value='対戦'>対戦</option>
                <option value='協力プレイ'>協力プレイ</option>
                <option value='対戦プレイ'>対戦プレイ</option>
            </select>
            <br>

            ご自身のゲームID:<br>
            <textarea  name="user_platform_id" placeholder="省略可"></textarea>
            <br>

    	     コメント:<br>
    		<textarea  name="comment"></textarea>
            <br>
            <input type="hidden" name="thread_device_name" value="{{$thread_device_name}}">
            <input type="hidden" name="thread_title" value="{{$thread_title}}">
            <input type="hidden" name="game_id" value="{{$game_id}}">
    	    <input type="submit" name="btn_submit" value="書き込む">
        </form>

    <?php foreach($posts_array as $post_array):?>
        <?php
            $date = $post_array->created_at;
            $purpose = $post_array->purpose;
            $user_platform_id = $post_array->user_platform_id_1;
            $comment =  $post_array->comment;
        ?>
        <?php echo $date;?><br>
        <?php echo $purpose;?><br>
        <?php echo $user_platform_id;?><br>
        <?php echo $comment;?>
        <br>
        <br>
    <?php endforeach?>
    <br>
    <a href="/threads_index">スレッド一覧に戻る</a>

@endsection
