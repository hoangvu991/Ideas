<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function follow(User $user) {
        $follower = auth()->user();

        $follower->followings()->attach($user);

        return redirect()->route('users.show', $user->id)->with('success', 'Followed successfully !');
    }

    public function nofollow(User $user) {
        $follower = auth()->user();

        $follower->followings()->detach($user);

        return redirect()->route('users.show', $user->id)->with('success', 'Followed successfully !');
    }

    public function like(Idea $idea) {
        $liker = auth()->user();

        $liker->likes()->attach($idea);

        return redirect()->route('home.page')->with('success', 'Liked successfully !');
    }

    public function unlike(Idea $idea) {
        $liker = auth()->user();

        $liker->likes()->detach($idea);

        return redirect()->route('home.page')->with('success', 'Liked successfully !');
    }
}
