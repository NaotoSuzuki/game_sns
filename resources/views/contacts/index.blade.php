@extends('layouts.app')

@section('title', 'game_sns')

@section('content')


<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">お問い合わせ</div>
            <div class="panel-body">
                {{-- エラーの表示 --}}

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {!! Form::open(['url' => 'contact/confirm',
                            'class' => 'form-horizontal']) !!}

                <!-- <div class="form{{ $errors->has('releasedate') ? ' has-error' : '' }}">
                    {!! Form::label('releasedate', 'リリース日/予定日:', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('releasedate', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('releasedate'))
                            <span class="help-block">
                                <strong>{{ $errors->first('releasedate') }}</strong>
                            </span>
                        @endif
                    </div>
                </div> -->

                <div class="form-group{{ $errors->has('device') ? ' has-error' : '' }}">
                    {!! Form::label('device', '返信先メールアドレス:', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('device', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('device'))
                            <span class="help-block">
                                 <strong> {{ $errors->first('device') }} </strong>
                            </span>
                        @endif
                    </div>
                </div>

                <!-- <div class="form-group{{ $errors->has('gametitle') ? ' has-error' : '' }}">
                    {!! Form::label('gametitle', 'タイトル:', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('gametitle', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('gametitle'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gametitle') }}</strong>
                            </span>
                        @endif
                    </div>
                </div> -->

                <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
                    {!! Form::label('note', 'お問い合わせ内容:', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">

                        {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('note'))
                            <span class="help-block">
                        <strong>{{ $errors->first('note') }}</strong>
                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        {!! Form::submit('確認', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
</div>


@endsection
