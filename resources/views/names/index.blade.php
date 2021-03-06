@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
    <h1>名前一覧</h1>
    
    @if (count($names) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>姓</th>
                <th>名</th>
                <th>メールアドレス</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($names as $name)
            <tr>
                {{-- 名前詳細ページへのリンク --}}
                <td>{!! link_to_route('names.show', $name->id, ['name' => $name->id]) !!}</td>
                <td>{{ $name->self }}</td>
                <td>{{ $name->title }}</td>
                <td>{{ $name->content }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    
    {{-- ページネーションのリンク --}}
    {{ $names->links() }}
    
    {{-- 名前作成ページへのリンク --}}
    {!! link_to_route('names.create', '新規名前の投稿',[],['class' => 'btn btn-primary']) !!}
    
@endsection