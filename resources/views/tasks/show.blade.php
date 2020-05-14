@extends('layouts.app')

@section('content')

    <h1>id = {{ $tasklist->id }} のタスク詳細ページshow.blade.php</h1>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $tasklist->id }}</td>
        </tr>
        
        <th>ステータス</th>
            <td>{{ $tasklist->status }}</td>
        
        
        
        
        
        <tr>
            <th>タスク</th>
            <td>{{ $tasklist->content }}</td>
        </tr>
    </table>
    
        {!! link_to_route('tasks.edit', 'このタスクを編集', ['id' => $tasklist->id], ['class' => 'btn btn-light']) !!}
        {!! Form::model($tasklist, ['route' => ['tasks.destroy', $tasklist->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}






@endsection