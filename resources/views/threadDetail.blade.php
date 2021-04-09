@extends('layouts.app')

@section('title', 'game_sns')

@section('content')


<header class="board-header">
    <div class="neon">
        <h1><a href="https://lobby-games.com/"><img src="static/img/board-head-logo.png" alt="LOBBY"></a></h1>
    </div>
</header>

<div class="board-wrap">
    <div class="container">
        <div class="body-wrap-inner">
            <div class="main-col">
                <div class="board-top-sec">
                    <div class="pankuzu">
                        ロビーリスト > APEX(PS4版)
                    </div>
                    <div class="board-title">
                        <h2>  {{$thread_title}}【{{$thread_device_name}}版】フレンド募集掲示板</h2>
                    </div>
                    <div class="board-title-desc">
                        <p>コチラは {{$thread_title}}({{$thread_device_name}}版)専用掲示板となります。フレンドやランクマッチなどの仲間を探す際にご利用ください。</p>
                    </div>
                    <div class="board-other-list">
                        <div class="board-other-list-top">
                            <p>※他の機器での掲示板はコチラ</p>
                        </div>
                        <ul>
                            <li><a href="q">APEX(PC版)</a></li>
                            <li><a href="q">APEX(Swich版)</a></li>
                        </ul>
                    </div>
                </div>
                <div class="board-post">
                    <form action = "{{url('/build_thread/post/save')}}" method="post" autocomplete="off">
                        @csrf
                        <fieldset id="form-friend-comment">
                            <table class="table">

                                    <tbody>
                                        <tr class="table-block">
                                            <th class="post-label">
                                                募集目的
                                            </th>
                                            <td>
                                                <select class="span6" style="" name="purpose" id="form_purpose">
                                                    <option value="1" selected="selected">フレンド</option>
                                                    <option value="2">協力プレイ</option>
                                                    <option value="3">対戦</option>
                                                    <option value="4">練習</option>
                                                    <option value="5">その他</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr class="table-block">
                                            <th class="post-label">
                                                ニックネーム
                                            </th>
                                            <td>
                                                <form action="/thread_detail/{{$thread_title}}" class="form-horizontal" method="post">
                                                    @csrf
                                                    <input type="text" class="post-name" name="usrName" value="" placeholder="名無しさん">
                                                    <input type="hidden" name="thread_device_name" value="{{$thread_device_name}}">
                                                    <input type="hidden" name="thread_title" value="{{$thread_title}}">
                                                    <input type="hidden" name="game_id" value="{{$game_id}}">
                                                    <input type="submit"></input>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr class="table-block">
                                            <th class="post-label">
                                                ご自身のゲームID
                                            </th>
                                            <td>
                                                <textarea  name="user_platform_id" placeholder="省略可"></textarea>
                                            </td>
                                        </tr>
                                        <tr class="table-block">
                                            <th class="post-label">
                                                募集概要
                                            </th>
                                            <td>

                                                <textarea  name="comment" class="post-desc" placeholder="募集人数/現在のレベル/募集する目的/募集するフレンドのレベル/プレイする時間帯/使用するVCソフトなど...自由に募集する内容をお書きください。"></textarea>
                                                <br>
                                                <input type="hidden" name="thread_device_name" value="{{$thread_device_name}}">
                                                <input type="hidden" name="thread_title" value="{{$thread_title}}">
                                                <input type="hidden" name="game_id" value="{{$game_id}}">
                                                <?php if(!empty($usrName)) :?>
                                                    <input type="hidden" name="usrName" value="{{$usrName}}">
                                                <?php endif ?>

                                            </td>
                                        </tr>
                                </tbody>

                        </table>
                        <div class="post-btn">
                            <input type="submit" value="送信" id="btn-post" class="btn btn-primary">
                        </div>
                        <div id="friend_warn_note" style="">※ 管理人が管理人としてここに書き込みをする事はありませんので、管理人を名乗る者が居たとしても信用しないようにお願い致します。<br>※ ここは出会い系サイトではありません。異性との出会いを目的とした募集は禁止しています。<br>※ 募集以外の書き込みに対しては削除＆規制する事があります。</div>
                        </fieldset>
                    </form>
                </div>
                <div class="post-list">
                    <div class="post-list-title">
                        <h2>■募集一覧</h2>
                    </div>
                    <!-- 名前記入 -->
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


                    <ul>
                        <li>
                            <div class="">

                                <div class="post-messege">
                                    <p>昨日買ったばかりで、初見の状態です。レンタルサーバーの借りましたので、同じ初見の方、始めたばかりの方一緒にやりませんか？条件として成人してる方とさせていただきます。興味のある方、Discordまでご連絡お願いします。</p>
                                </div>
                                <div class="post-time">
                                    <span class="name">名無しさん</span> 2021-03-22 02:39:15
                                </div>
                            </div>
                            <div class="post-reply-list">
                                <div class="post-repry-text">
                                    <p>初めまして！私も昨日から始めたのですが、一人でやるより何人かでやった方が楽しそうだなと思いましてご連絡させて頂きました。プレイする時間は大体21時頃が多いのですがいかがでしょうか？</p>
                                    <span class="name">名無しさん</span><span class="reply-time">2021-03-22 02:41:55</span>
                                </div>
                            </div>
                            <div class="post-reply">
                                <button class="readmore">
                                    コメントする
                                </button>
                            </div>
                            <div class="reply-form hide-text">
                                <form class="" action="index.html" method="post">
                                    <div class="">
                                        <textarea name="name" placeholder="投稿に対する質問や参加希望などをお書きください。"></textarea>
                                    </div>
                                    <div class="reply-send-btn">
                                        <input type="submit" value="コメントを送信" id="btn-post" class="btn btn-primary"　>
                                    </div>
                                </form>
                            </div>

                        </li>
                    </ul>
                </div>


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

                    <?php if(!empty($replies_array)) :?>
                        <!-- 返信配列 -->

                            <?php foreach ($replies_array as $key => $reply_array): ?>
                                <p>
                                <?php
                                    $id = $reply_array->post_id;
                                    $reply_id = $reply_array->id;
                                    $reply = $reply_array->reply;
                                    $usrReplying = $reply_array->usrName;
                                    $reply_at = $reply_array->reply_at;
                                    if($id == $post_id){
                                        if(empty($reply_array->replyId_at)){
                                         echo($usrReplying);
                                         echo($reply_at);
                                         echo(':');
                                         echo($reply);
                                        }
                                     }
                                 ?>
                                </p>

                                <!-- 返信の返信フォーム -->
                                <form action="{{url('/build_thread/post/reply')}}" class="form-horizontal" method="post">
                                    @csrf
                                    <input type="hidden" name="thread_device_name" value="{{$thread_device_name}}">
                                    <input type="hidden" name="thread_title" value="{{$thread_title}}">
                                    <input type="hidden" name="game_id" value="{{$game_id}}">
                                    <input type="hidden" name="usrName" value="{{$usrName}}">
                                    <input type="hidden" name="thread_id" value="{{$thread_id}}">
                                    <input type="hidden" name="post_id" value="{{$post_id}}">
                                    <input type="hidden" name="reply_id" value="{{$reply_id}}">
                                    <input type="hidden" name="replied_id" value="{{$reply_id}}">
                                    <input type="hidden" name="replied_user" value="{{$usrReplying}}">
                                    <input type="text" name="reply" value="" placeholder="{{$usrReplying}}へ返信">
                                    <input type="submit" name="btn_submit" value="返信へ返信する">
                                </fomr>
                                <!-- 返信スレッドはトグルにする -->
                            <?php endforeach; ?>
                    <?php endif ?>

                <?php endforeach?>





            </div><!--main-col-->


            <div class="side-bar">
                <div class="ranking-box sp_sw">
                    <div class="ranking-title">
                        <h2>人気オンラインゲーム</h2>
                    </div>
                    <div class="ranking-list">
                        <ul>
                            <li>APEX</li>
                            <li>VALORANT</li>
                            <li>レインボーシックス シージ</li>
                            <li>フォートナイト</li>
                            <li>Destiny2</li>
                            <li>モンスターハンターワールド</li>
                            <li>機動戦士GO2</li>
                            <li>Verheim</li>
                            <li>ファイナルファンタジーXIV</li>
                            <li>原神-GENSHIN-</li>
                        </ul>
                    </div>
                </div>
                <div class="side-list">
                    <ul>
                        <li>
                            <a href="board.html"><img src="static/img/contact-side-img.png" alt=""></a>
                        </li>
                        <li>
                            <a href="board.html"><img src="static/img/test01.png" alt=""></a>
                        </li>
                        <li>
                            <a href="board.html"><img src="static/img/test01.png" alt=""></a>
                        </li>
                    </ul>
                </div>
            </div><!--side-bar-->
        </div><!--body-wrap-inner-->
    </div>
</div>



    <br>
    <a href="/contact">お問い合わせ</a>
    <a href="/threads_index">スレッド一覧に戻る</a>




@endsection
