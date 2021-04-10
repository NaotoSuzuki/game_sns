@extends('layouts.app')

@section('title', 'game_sns')

@section('content')


    <header id="top-header">
        <div class="container">
            <div class="header-games-logo">
                <img class="pc_sw" src="/static/img/header-games-logo.png" alt="">
                <img class="sp_sw" src="/static/img/header-games-logo-sp.png" alt="">
            </div>
            <div class="header-title neon">
                <h1><img class="" src="/static/img/lobby-logo.png" alt="LOBBY"></h1>
            </div>
            <div class="header-title-mini">
                <h2>オンラインゲーム専用フレンド募集掲示板</h2>
            </div>
        </div>
        <div class="header-messege">
            <div class="container">
                <p>当サイトは各ゲームタイトルによって分けられたオンラインゲーム専用掲示板サイトとなります。<br>一緒にゲームをプレイする仲間を探しましょう！</p>
            </div>
        </div>
    </header>

    <div class="home-news-sec">
        <div class="container">
            <div class="home-news-inner">
                <div class="home-news-left">
                    <span class="jost">NEWS</span>
                </div>
                <div class="home-news-list">
                    <ul>
                        <li>
                            <a href="#">
                                <span class="home-news-day">2021/03/30</span><br class="sp_sw">
                                <span class="home-news-text">サイトオープン！ご利用方法はこちらからご確認ください！</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="home-news-day">2021/03/30</span><br class="sp_sw">
                                <span class="home-news-text">新たに「モンスターハンタライズ掲示板」を追加いたしました。</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>





        <div class="body-wrap">
            <div class="container">
                <div class="body-wrap-inner">
                    <div class="main-col">
                        <div class="body-title">
                            <h2>LOBBY LIST</h2>
                        </div>

                        <div class="game-list">
                            <ul>
                                    <?php $i = 0  ?>
                                    @foreach($thread_array as $thread)
                                        <?php $i++ ?>
                                        <li>
                                            <form action = {{url("/thread_detail/{$thread->thread_title}")}} method="post" autocomplete="off">
                                                @csrf
                                                <input type="hidden" name ='game_id' value='{{$thread->game_id}}'>
                                                <input type="hidden" name ='thread_title' value='{{$thread->thread_title}}'>
                                                <input type="hidden"  name ='thread_device_name' value='{{$thread->thread_device_name}}'>

                                                <div class="game-img">
                                                    <button type="submit" class="btn btn-link">
                                                    <a href="board.html"><img src="/static/img/game-img0{{$i}}.png" alt=""></a>
                                                    </button>
                                                </div>
                                                <div class="game-title">
                                                    <button type="submit" class="btn btn-link">{{$thread->thread_title}}</button>
                                                </div>
                                            </form>
                                            機器名：{{$thread->thread_device_name}}
                                            <div class="game-desc">
                                                <p>備考:{{$thread->note}}<p>
                                            </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
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
                                    <a href="/contact"><img src="/static/img/contact-side-img.png" alt=""></a>
                                </li>
                                <li>
                                    <a href="board.html"><img src="/static/img/test01.png" alt=""></a>
                                </li>
                                <li>
                                    <a href="board.html"><img src="/static/img/test01.png" alt=""></a>
                                </li>
                            </ul>
                        </div>
                        <div class="ranking-box pc_sw">
                            <div class="ranking-title">
                                <h2>人気オンラインゲーム</h2>
                            </div>
                            <div class="ranking-list">
                                <ul>
                                    <?php foreach($ranks_array as $key => $rank_array) :?>
                                        <li>
                                            <?php $key++  ?>
                                            NO.<?php echo $key ?>:<?php echo $rank_array->game_title?>(<?php echo $rank_array->count?>)<br>
                                        </li>
                                    <?php endforeach ?>
                                    <!-- <li>APEX</li>
                                    <li>VALORANT</li>
                                    <li>レインボーシックス シージ</li>
                                    <li>フォートナイト</li>
                                    <li>Destiny2</li>
                                    <li>モンスターハンターワールド</li>
                                    <li>機動戦士GO2</li>
                                    <li>Verheim</li>
                                    <li>ファイナルファンタジーXIV</li>
                                    <li>原神-GENSHIN-</li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





@endsection
