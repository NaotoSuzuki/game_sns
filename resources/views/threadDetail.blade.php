@extends('layouts.app')

@section('title', 'game_sns')

@section('content')


<header class="board-header">
    <div class="neon">
        <h1><a href="/"><img src="/static/img/board-head-logo.png" alt="LOBBY"></a></h1>
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
                                                    <option value="フレンド募集" selected="selected">フレンド</option>
                                                    <option value="協力プレイ">協力プレイ</option>
                                                    <option value="対戦">対戦</option>
                                                    <option value="練習">練習</option>
                                                    <option value="その他">その他</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr class="table-block">
                                            <th class="post-label">
                                                ニックネーム
                                            </th>
                                            <td>
                                                <input type="text" class="post-name" name="usrName" value="" placeholder="名無しさん">
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

                        <ul>
                                <li>
                            <!-- 投稿配列 -->
                            <?php foreach($posts_array as $post_array):?>
                                <div class="">
                                    <?php
                                        $post_id = $post_array->id;
                                        $posted_user = $post_array->usrName;
                                        $date = $post_array->created_at;
                                        $purpose = $post_array->purpose;
                                        $user_platform_id = $post_array->user_platform_id_1;
                                        $comment =  $post_array->comment;
                                    ?>

                                        <!-- 投稿内容 -->
                                        <div class="post-time">
                                            <span class="name"><?php echo $posted_user;?></span><p><?php echo $date;?></p>
                                        </div>
                                        <div class="post-list-purpose">
                                            <div class="post-span6label">
                                                募集目的 |
                                            </div>
                                            <div class="post-purpose-uns">
                                                <?php echo $purpose;?><br>
                                            </div>
                                        </div>
                                        <div class="post-list-purpose">
                                            <div class="post-span6label">
                                                通信ツールID |
                                            </div>
                                            <div class="post-purpose-uns">
                                                <?php echo $user_platform_id;?><br>
                                            </div>
                                        </div>
                                        <div class="post-messege">
                                            <?php echo $comment;?>
                                        </div>
                                        <!-- 投稿内容// -->
                                </div>



                                            <!-- 返信表示 -->
                                            <?php if(!empty($replies_array)) :?>
                                                    <?php foreach ($replies_array as $key => $reply_array): ?>
                                                        <div class="post-reply-list">
                                                            <div class="post-repry-text">
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
                                                            </div>
                                                        </div>
                                                        <!-- 返信表示// -->
                                                <?php endforeach; ?><!-- ($replies_array as $key => $reply_array)-->
                                            <?php endif ?><!--if(!empty($replies_array)) -->

                                            <div class="post-reply">
                                                <button class="readmore">
                                                    コメントする
                                                </button>
                                            </div>
                                            <div class="reply-form hide-text">
                                                <form action = "{{url('/build_thread/post/reply')}}" method="post" autocomplete="off">
                                                    @csrf
                                                    <input type="hidden" name="thread_device_name" value="{{$thread_device_name}}">
                                                    <input type="hidden" name="thread_title" value="{{$thread_title}}">
                                                    <input type="hidden" name="game_id" value="{{$game_id}}">
                                                    <input type="hidden" name="usrName" value="{{$usrName}}">
                                                    <input type="hidden" name="thread_id" value="{{$thread_id}}">
                                                    <input type="hidden" name="post_id" value="{{$post_id}}">
                                                    <input type="text" name="usrName" value="" placeholder="名無しさん">
                                                    <div class="">
            											<textarea name="reply" placeholder="投稿に対する質問や参加希望などをお書きください。"></textarea>
            										</div>
                                                    <div class="reply-send-btn">
                                                        <input type="submit" name="btn_submit" id="btn-post" class="btn btn-primary" value="コメントを送信">
                                                    </div>
                                                </form>
                                            </div>
                            <?php endforeach?><!--posts_array-->






                        </li>
                    </ul>
                </div><!--post-list-->
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
                            <a href="board.html"><img src="/static/img/contact-side-img.png" alt=""></a>
                        </li>
                        <li>
                            <a href="board.html"><img src="/static/img/test01.png" alt=""></a>
                        </li>
                        <li>
                            <a href="board.html"><img src="/static/img/test01.png" alt=""></a>
                        </li>
                    </ul>
                </div>
            </div><!--side-bar-->
        </div><!--body-wrap-inner-->
    </div>
</div>



    <br>
    <a href="/contact">お問い合わせ</a>
    <a href="/">スレッド一覧に戻る</a>




@endsection
