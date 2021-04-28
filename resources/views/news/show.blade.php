@extends('layout.app')

@section('title', 'News - ' . $news->title)

@section('content')

    <div>
        <h1>{{ $news->title }}</h1>
        <p>Uploaded by: <strong>{{ $news->user->name }}</strong></p>
        <p>{{ $news->content }}</p>
    </div>
    <div class="mt-5">
        <h2>Related teams</h2>
        @forelse ($news->teams as $team)
            <h5><a href="{{ route('team', ['team' => $team->id]) }}">{{ $team->name }}</a></h5>
        @empty
            <p>No news for this team</p>
        @endforelse
    </div>

@endsection
