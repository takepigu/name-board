@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
   
    @if(count($errors) > 0)
    <ul class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            <li class="ml-4">{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <h1>名前新規作成ページ</h1>
    
    <div class="row">
        <div class="col-6">
            {!! Form::model($name,['route' => 'names.store']) !!}
            
                <div class="form-group">
                    {!! Form::label('title','タイトル:') !!}
                    {!! Form::text('title',null,['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                   {!! Form::label('content', '名前:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>


@endsection