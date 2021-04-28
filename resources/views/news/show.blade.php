@extends('layout.app')

@section('title', 'News - ' . $news->title)

@section('content')

    <div>
        <h1>{{ $news->title }}</h1>
        <p>Uploaded by: <strong>{{ $news->user->name }}</strong></p>
        <p>{{ $news->content }}</p>
    </div>

@endsection
