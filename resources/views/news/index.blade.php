@extends('layout.app')

@section('title', 'News')

@section('content')

    <div>
        <h1>News</h1>
        @forelse ($news as $singleNews)
            <div class="mb-3">
                <a href="{{ route('news', ['news' => $singleNews->id]) }}">
                    <h2>{{ $singleNews->title }}</h2>
                </a><span>Uploaded by: <strong>{{ $singleNews->user->name }}</strong></span>
            </div>
        @empty
            <h3>No news.</h3>
        @endforelse
        {{ $news->links() }}
    </div>

@endsection
