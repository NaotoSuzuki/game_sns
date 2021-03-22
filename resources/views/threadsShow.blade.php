@extends('layouts.app')

@section('title', 'game_sns')

@section('content')

<form action = "{{url('/savePost')}}" method="post" autocomplete="off">
    @csrf

    対象機器:<!-- {{$device_name}} -->

    目的：
    <select name='purpose'>
        <option value='フレンド募集'>フレンド募集</option>
        <option value='練習'>練習</option>
        <option value='対戦'>対戦</option>
        <option value='協力プレイ'>協力プレイ</option>
        <option value='対戦プレイ'>対戦プレイ</option>
    </select>
    <br>
     コメント:<br>
    <textarea  name="comment"></textarea>
    <br>
    <input type="submit" name="btn_submit" value="書き込む">
</form>
@foreach($thread_array as $thread)



@endforeach



@endsection
