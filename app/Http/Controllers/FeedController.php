<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $followingsID = auth()->user()->followings()->pluck('user_id');

        $ideas = Idea::whereIn('user_id', $followingsID)->latest();

        if(Request()->has('search')) {
            $ideas = $ideas->where('content', 'like', '%'. request()->get('search'). '%');
        }
        $users = User::where('id', '!=', auth()->user())->paginate(5);

        return view('dashboard', [
            'ideas' => $ideas->paginate(5),
            'users' => $users
        ]);
    }
}
