@extends('wiki.app')

@section('content')
    <h1>Home</h1>
    <ul>
        @foreach ($wikis as $wiki)
            <li>
                <a href="{{ $wiki->url }}">
                    {{ $wiki->title }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
