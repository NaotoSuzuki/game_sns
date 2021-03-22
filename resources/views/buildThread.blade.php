@extends('layouts.app')

@section('title', 'game_sns')

@section('content')


    <form action = "{{url('/build_thread')}}" method="post" autocomplete="off">
        @csrf
        スレッドタイトル:<br>
            <input name="thread_title" required="required">
        <br>
        ゲームタイトル：<br>
        <select name='game_id' required="required">
            <option value='1'>Apex Legends</option>
            <option value='2'>Valheim</option>
            <option value='3'>Mine Craft</option>
        </select>
        <br>


        機器名：<br>
        <select name='thread_device_id' required="required">
            <option value='1'>PS4</option>
            <option value='2'>PC</option>
            <option value='3'>Xbox</option>
            <option value='4'>Switch</option>
        </select>
        <br>
        備考：<br>
        <textarea  name="note" required="required"></textarea><br>
	    <input type="submit" name="btn_submit" value="作成する">
    </form>


@endsection
