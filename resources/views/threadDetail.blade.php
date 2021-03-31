@extends('layouts.app')

@section('title', 'game_sns')

@section('content')

    スレッドタイトル：{{$thread_title}}
    <br>
    <a href="/contact">お問い合わせ</a>
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

            <div id="open">
              書き込む
            </div>

            <div id="mask" class="hidden"></div>

            <section id="modal" class="hidden">
              <form action="{{ route('addName') }}" class="form-horizontal" method="post">
                  <input type="text" name="usrName" value="" placeholder="掲示板で使うニックネームを入力してください。">
              <form>
              <input type="submit">決定</input>
            <div id="close">
                閉じる
              </div>
            </section>


        </form>
    <br>

    <?php foreach($posts_array as $post_array):?>

        <?php
            $post_id = $post_array->id;
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
        <hr>
        <br>

        <?php foreach ($replies_array as $key => $reply_array): ?>
            <p>
            <?php
                $id = $reply_array->post_id;
                $reply = $reply_array->reply;

                 if($id == $post_id){
                     echo($reply);
                 }
             ?>
            </p>
        <?php endforeach; ?>



        <form action = "{{url('/build_thread/post/reply')}}" method="post" autocomplete="off">
            @csrf
            <input type="hidden" name="thread_device_name" value="{{$thread_device_name}}">
            <input type="hidden" name="thread_title" value="{{$thread_title}}">
            <input type="hidden" name="game_id" value="{{$game_id}}">
            <input type="hidden" name="thread_id" value="{{$thread_id}}">
            <input type="hidden" name="post_id" value="{{$post_id}}">
            <input type="textarea" name="reply" value="" placeholder="返信">
            <input type="submit" name="btn_submit" value="返信する">
        </form>
        <hr>
        <hr>
    <?php endforeach?>
    <br>
    <a href="/threads_index">スレッド一覧に戻る</a>


@endsection
