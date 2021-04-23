@extends('layout.app')

@section('title', "$player->first_name $player->last_name")

@section('content')

    <div>
        <div>
            <h1>{{ $player->first_name }} {{ $player->last_name }}</h1>
            <p><strong>Email: </strong><a href="mailto:{{ $player->email }}">{{ $player->email }}</a></p>
            <p><strong>Team: </strong><a
                    href="{{ route('team', ['team' => $player->team->id]) }}">{{ $player->team->name }}</a></p>
        </div>
    </div>

@endsection
