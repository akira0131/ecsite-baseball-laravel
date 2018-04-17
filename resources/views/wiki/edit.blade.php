@extends('layouts.admin')

@section('content')
    <h1>Form</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($wiki->id)
        <form action="/admin/wiki/{{ $wiki->title }}" method="POST">
            {{ method_field('PUT') }}
    @else
        <form action="/admin/wiki" method="POST">
    @endif
        {{ csrf_field() }}
        <div class="form-group @if($errors->has('title')) has-error @endif">
            <label class="control-label">Title</label>
            <input name="title" type="text" class="form-control" value="{{ old('title', $wiki->title) }}">
        </div>
        <div class="form-group @if($errors->has('body')) has-error @endif">
            <label class="control-label">Body</label>
            <textarea name="body" class="form-control" name="" id="" cols="30" rows="10">{{ old('body', $wiki->body) }}</textarea>
        </div>
        <input type="submit" class="form-control btn-primary">
    </form>
@endsection
