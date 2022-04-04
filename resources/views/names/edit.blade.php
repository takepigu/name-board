@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
   
    
    <h1>id: {{ $name->id }} の名前編集ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($name, ['route' => ['names.update',$name->id],'method' => 'put']) !!}
            
                <div class="form-group">
                    {!! Form::;label('title','タイトル:') !!}
                    {!! Form::text('title',null,['class' => 'form-control']) !!}
                </div>
            
                <div class="form-group">
                    {!! Form::label('content','名前:') !!}
                    {!! Form::text('content',null,['class' => 'form-control']) !!}
                </div> 
                
                {!! Form::submit('更新',['class' => 'btn btn-primary']) !!}
                
            {!! Form::close() !!}
        </div>
    </div>
@endsection