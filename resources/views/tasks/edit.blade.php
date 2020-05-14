@extends('layouts.app')

@section('content')

    <h1>id: {{ $tasklist->id }} のメッセージ編集ページedit.blade.php</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($tasklist, ['route' => ['tasks.update', $tasklist->id], 'method' => 'put']) !!}
        
                <div class="form-group">
                    {!! Form::label('content', 'メッセージ:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
        
                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>

@endsection