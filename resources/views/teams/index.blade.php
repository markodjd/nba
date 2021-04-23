@extends('layout.app')

@section('title', 'Nba - Teams')

@section('content')

    <div>
        <h1>Teams</h1>
        @forelse ($teams as $team)
            <a href="{{ route('team', ['team' => $team->id]) }}">
                <div>
                    <h2>{{ $team->name }}</h2>
                </div>
            </a>
        @empty
            <h3>No teams.</h3>
        @endforelse
    </div>

@endsection
