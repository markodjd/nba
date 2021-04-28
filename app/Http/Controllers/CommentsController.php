<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Mail\CommentReceived;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CommentsController extends Controller {
    public function store(Team $team, CreateCommentRequest $request) {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $newComment = $team->comments()->create($data);
        Mail::to($team->email)->queue(new CommentReceived($team, $newComment));
        return redirect("/teams/$team->id");
    }
}
