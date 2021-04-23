@extends('layout.app')

@section('title', $team->name)

@section('content')

    <div>
        <div>
            <h1>{{ $team->name }}</h1>
            <p><strong>Email: </strong><a href="mailto:{{ $team->email }}">{{ $team->email }}</a></p>
            <p><strong>City: </strong>{{ $team->city }}</p>
            <p><strong>Address: </strong>{{ $team->address }}</p>
            <div>
                <h4>List of players</h4>
                <ul>
                    @forelse ($team->players as $player)
                        <li><a href="{{ route('player', ['player' => $player->id]) }}">{{ $player->first_name }}
                                {{ $player->last_name }}</a></li>
                    @empty
                        <p>This team has no players</p>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

@endsection
