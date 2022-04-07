@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

    <h1>id = {{ $name->id }} の名前詳細ページ</h1>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $name->id }}</td>
        </tr>
        <tr>
            <th>姓</th>
            <td>{{ $name->self }}</td>
        </tr>
        <tr>
            <th>名</th>
            <td>{{ $name->title }}</td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td>{{ $name->content }}</td>
        </tr>
    </table>
    
    {{-- 名前編集ページへのリンク --}}
    {!! link_to_route('names.edit', 'この名前を編集', ['name' => $name->id], ['class' => 'btn btn-light']) !!}
    
    {{-- 名前削除フォーム --}}
    {!! Form::model($name,['route' => ['names.destroy', $name->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除',['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    
@endsection