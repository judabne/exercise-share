<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Auth;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //so that every function in the PostsController will require auth.
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->latest()-> get();
        return view('home', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'bodypart' => 'required',
            'image' => ['required', 'image'],
        ]);

        $user = auth()->user();
        $imagePath = request('image')->store('uploads/'.$user->id, 'public'); //do not forget php artisan storage:link
        $user->posts()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'bodypart' => $data['bodypart'],
            'image' => $imagePath
        ]);

        return redirect('/profile/'. auth()->user()->id);
    }

    /**public function display()
    {
        return $this->id;
    }**/

}
