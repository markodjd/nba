<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Team;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller {
    public function store(Team $team, CreateCommentRequest $request) {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $team->comments()->create($data);

        return redirect("/teams/$team->id");
    }
}
