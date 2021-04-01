@extends('layouts.app')

@section('title', 'game_sns')

@section('content')

    スレッドタイトル：{{$thread_title}}
    <br>
    <a href="/contact">お問い合わせ</a>
    <a href="/threads_index">スレッド一覧に戻る</a>


    <?php if(empty($usrName)) :?>
        <div id="open">
          書き込む
        </div>

        <div id="mask" class="hidden"></div>
        <!-- 名前入力フォーム -->
        <section id="modal" class="hidden">
          <form action="/thread_detail/{{$thread_title}}" class="form-horizontal" method="post">
              @csrf
              <input type="text" name="usrName" value="" placeholder="掲示板で使うニックネームを入力してください。">
              <input type="hidden" name="thread_device_name" value="{{$thread_device_name}}">
              <input type="hidden" name="thread_title" value="{{$thread_title}}">
              <input type="hidden" name="game_id" value="{{$game_id}}">
              <input type="submit"></input>
          </form>

        <div id="close">
            閉じる
          </div>
        </section>
    <?php endif ?>

        <!-- 投稿フォーム -->
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
            <?php if(!empty($usrName)) :?>
                <input type="hidden" name="usrName" value="{{$usrName}}">
            <?php endif ?>
    	    <input type="submit" name="btn_submit" value="書き込む">

        </form>
        <br>

        <!-- 投稿配列 -->
        <?php foreach($posts_array as $post_array):?>

            <?php
                $post_id = $post_array->id;
                $posted_user = $post_array->usrName;
                $date = $post_array->created_at;
                $purpose = $post_array->purpose;
                $user_platform_id = $post_array->user_platform_id_1;
                $comment =  $post_array->comment;
            ?>
            <?php echo $date;?><br>
            <?php echo $posted_user;?><br>
            <?php echo $purpose;?><br>
            <?php echo $user_platform_id;?><br>
            <?php echo $comment;?>

            <!-- 名前入力フォーム -->
            <?php if(empty($usrName)) :?>
                <div id="open">
                  書き込む
                </div>
                <div id="mask" class="hidden"></div>
                <section id="modal" class="hidden">
                  <form action="/thread_detail/{{$thread_title}}" class="form-horizontal" method="post">
                      @csrf
                      <input type="text" name="usrName" value="" placeholder="ニックネームを入力してください">
                      <input type="hidden" name="thread_device_name" value="{{$thread_device_name}}">
                      <input type="hidden" name="thread_title" value="{{$thread_title}}">
                      <input type="hidden" name="game_id" value="{{$game_id}}">
                      <input type="submit"></input>
                  <form>
                  <div id="close"></div>
                </section>
            <?php endif ?>

            <!-- 投稿への返信フォーム -->
            <form action = "{{url('/build_thread/post/reply')}}" method="post" autocomplete="off">
                @csrf
                <input type="hidden" name="thread_device_name" value="{{$thread_device_name}}">
                <input type="hidden" name="thread_title" value="{{$thread_title}}">
                <input type="hidden" name="game_id" value="{{$game_id}}">
                <input type="hidden" name="usrName" value="{{$usrName}}">
                <input type="hidden" name="thread_id" value="{{$thread_id}}">
                <input type="hidden" name="post_id" value="{{$post_id}}">
                <input type="textarea" name="reply" value="" placeholder="返信">
                <input type="submit" name="btn_submit" value="返信する">
            </form>
            <br>
            <br>
            <br>

            <?php if(!empty($replies_array)) :?>
                <!-- 返信配列 -->
                    <?php foreach ($replies_array as $key => $reply_array): ?>
                        <p>
                        <?php
                            $id = $reply_array->post_id;
                            $reply = $reply_array->reply;
                            $usrRypling = $reply_array->usrName;
                            $reply_at = $reply_array->reply_at;
                            if(!empty($reply_at)){
                                echo($reply_at);
                                echo($usrRypling);
                                echo(':');
                                echo($reply);
                            }elseif($id == $post_id){
                                 echo($usrRypling);
                                 echo(':');
                                 echo($reply);
                             }
                         ?>
                        </p>

                        <!-- 返信への返信配列 -->

                        <!-- 返信への返信への返信フォーム -->

                        <!-- 返信の返信フォーム -->
                        <form action="{{url('/build_thread/post/reply')}}" class="form-horizontal" method="post">
                            @csrf
                            <input type="hidden" name="thread_device_name" value="{{$thread_device_name}}">
                            <input type="hidden" name="thread_title" value="{{$thread_title}}">
                            <input type="hidden" name="game_id" value="{{$game_id}}">
                            <input type="hidden" name="usrName" value="{{$usrName}}">
                            <input type="hidden" name="thread_id" value="{{$thread_id}}">
                            <input type="hidden" name="post_id" value="{{$post_id}}">
                            <input type="hidden" name="replied_user" value="{{$usrRypling}}">
                            <input type="text" name="reply" value="" placeholder="{{$usrRypling}}へ返信">
                            <input type="submit" name="btn_submit" value="返信する">
                        </fomr>
                        <!-- 返信スレッドはトグルにする -->
                    <?php endforeach; ?>
            <?php endif ?>




                        <hr>
                        <hr>


        <?php endforeach?>
        <!-- 投稿表示配列の締め -->
        <br>
        <a href="/threads_index">スレッド一覧に戻る</a>


@endsection
