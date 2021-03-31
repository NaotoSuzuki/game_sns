@extends('layouts.app')

@section('title', 'game_sns')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">お問い合わせ</div>
                <div class="panel-body">
                    <p>誤りがないことを確認のうえ送信ボタンをクリックしてください。</p>

                    <table class="table">
                        <tr>
                            <th>返信用メールアドレス</th>
                            <td>{{ $contact->device }}</td>
                        </tr>
                        <!-- <tr>
                            <th>リリース日</th>
                            <td>{{ $contact->releasedate }}</td>
                        </tr>
                        <tr>
                            <th>ゲームタイトル</th>
                            <td>{{ $contact->gametitle }}</td>
                        </tr> -->
                        <tr>
                            <th>備考・説明</th>
                            <td>{{ $contact->note }}</td>
                        </tr>
                        <tr>

                    </table>

                    {!! Form::open(['url' => 'contact/complete',
                                    'class' => 'form-horizontal',
                                    'id' => 'post-input']) !!}

                    @foreach($contact->getAttributes() as $key => $value)
                        @if(isset($value))
                            @if(is_array($value))
                                @foreach($value as $subValue)
                                    <input name="{{ $key }}[]" type="hidden" value="{{ $subValue }}">
                                @endforeach
                            @else
                                {!! Form::hidden($key, $value) !!}
                            @endif

                        @endif
                    @endforeach

                    {!! Form::submit('戻る', ['name' => 'action', 'class' => 'btn']) !!}
                    {!! Form::submit('送信', ['name' => 'action', 'class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
