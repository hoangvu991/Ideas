<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $ideas = Idea::withCount('likes')->orderBy('created_at', 'DESC');

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
