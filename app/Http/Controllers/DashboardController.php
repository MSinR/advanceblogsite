<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
USE App\Post;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.dashboard')->withPosts($user->posts);
    }
}
