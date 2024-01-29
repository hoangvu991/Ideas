<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Idea $idea) {
       
        Comment::create([
            'idea_id' => $idea->id,
            'content' => request()->content,
            'user_id' => auth()->id()
        ]);

        return redirect()->back()->with('success', 'Comment created successfully !');
    }
}
