@extends('layouts.app')

@section('title', 'game_sns')

@section('content')

<div class="row">


        <div class="col">
        @foreach($thread_array as $thread)

            <form action = {{url("/thread_detail/{$thread->thread_title}")}} method="post" autocomplete="off">
                @csrf
                <input type="hidden" name ='game_id' value='{{$thread->game_id}}'>
                <input type="hidden" name ='thread_title' value='{{$thread->thread_title}}'>
                <input type="hidden"  name ='thread_device_name' value='{{$thread->thread_device_name}}'>
                <button type="submit" class="btn btn-link">{{$thread->thread_title}}</button>
            </form>
            機器名：{{$thread->thread_device_name}}<br>
            備考:{{$thread->note}}<br>
            <br>
        @endforeach
        </div>

        <div class="col-3">
            <div class="sidebar_content">
                人気ランキング<br>

                <?php foreach($ranks_array as $key => $rank_array) :?>
                <?php $key++  ?>
                NO.<?php echo $key ?>:<?php echo $rank_array->game_title?>(<?php echo $rank_array->count?>)<br>
                <?php endforeach ?>
            </div>
        </div>



</div>

@endsection
