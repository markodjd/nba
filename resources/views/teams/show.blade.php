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
            <div>
                <h3>Comments</h3>
                <div>
                    @auth
                        <form method="POST" action="/teams/{{ $team->id }}/comments" class="w-50 mt-3">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="team_id" value="{{ $team->id }}">
                            <div class=" form-group mt-3">
                                <textarea rows="3" class="form-control" id="content" name="content"
                                    placeholder="Comment..."></textarea>
                                @error('content')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    @endauth
                    @forelse ($team->comments as $comment)
                        <div class="border p-2 w-50 bg-light mt-3">
                            <p class="m-0"><strong>{{ $comment->user->name }}</strong> -
                                <span>{{ $comment->created_at->diffForHumans() }}</span>
                            </p>
                            <p class="m-0">{{ $comment->content }}</p>
                        </div>
                    @empty
                        <p>No comments.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection
