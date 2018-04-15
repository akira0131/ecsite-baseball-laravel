@extends('wiki.app')

@section('content')
    <h1>{{ $wiki->title }}</h1>
    @if ($wiki->id)
        <div>
            {!! $wiki->markdown_body !!}
        </div>
    @else
        <div class="well">
            この名前のページはまだ作成されていません
        </div>
        <div>
            <a href="{{ route('wiki.create', ['title' => $wiki->title]) }}">ページを作成</a>
        </div>
    @endif
@endsection
