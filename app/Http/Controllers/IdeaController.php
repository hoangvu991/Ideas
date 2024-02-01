<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdeaFormRequest;
use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(IdeaFormRequest $req) {
        $validated =  $req->validated();

        $validated['user_id'] = auth()->id();
        Idea::create($validated);
        return redirect('/')->with('success', 'Idea created successfully !');
    }

    public function destroy(Idea $idea) {
        $this->authorize('delete', $idea);

        $idea->delete();
        return redirect('/')->with('success', 'Idea deleted successfully !');
    }

    public function show(Idea $idea) {
        $comments = Comment::with('user')->get();
        return view('ideas.show', compact('idea', 'comments'));
    }

    public function edit(Idea $idea) {
        $this->authorize('update', $idea);

        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea, IdeaFormRequest $req) {
        $this->authorize('update', $idea);

        $validated =  $req->validated();
        
        $idea->update($validated);
        return redirect()->route('idea.show', $idea)->with('success', 'Idea updated successfully !');
    }
}
