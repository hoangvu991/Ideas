<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(Request $req) {
        $validated =  $req->validate([
            'content' => 'required|min:5|max:240'
        ]);

        $validated['user_id'] = auth()->id();
        Idea::create($validated);
        return redirect('/')->with('success', 'Idea created successfully !');
    }

    public function destroy(Idea $idea) {
        if(auth()->id() !== $idea->user_id) {
            return redirect('/')->with('success', 'You don\'t have this permission!');
        }

        $idea->delete();
        return redirect('/')->with('success', 'Idea deleted successfully !');
    }

    public function show(Idea $idea) {
        $comments = Comment::with('user')->get();
        return view('ideas.show', compact('idea', 'comments'));
    }

    public function edit(Idea $idea) {
        if(auth()->id() !== $idea->user_id) {
            return redirect('/')->with('success', 'You don\'t have this permission!');
        }

        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea) {
        if(auth()->id() !== $idea->user_id) {
            return redirect('/')->with('success', 'You don\'t have this permission!');
        }

        $validated =  request()->validate([
            'content' => 'required|min:5|max:240'
        ]);
        
        $idea->update($validated);
        return redirect()->route('idea.show', $idea)->with('success', 'Idea updated successfully !');
    }
}
