<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(Request $req) {
        $validated =  $req->validate([
            'content' => 'required|min:5|max:240'
        ]);

        Idea::create($validated);
        return redirect('/')->with('success', 'Idea created successfully !');
    }

    public function delete(Idea $idea) {
        $idea->delete();
        return redirect('/')->with('success', 'Idea deleted successfully !');
    }

    public function show(Idea $idea) {
        return view('ideas.show', compact('idea'));
    }

    public function edit(Idea $idea) {
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea) {
        $validated =  request()->validate([
            'content' => 'required|min:5|max:240'
        ]);
        
        $idea->update($validated);
        return redirect()->route('idea.show', $idea)->with('success', 'Idea updated successfully !');
    }
}