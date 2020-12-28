<?php

namespace App\Http\Controllers;

use App\Profiles;
use App\User; //without this we will have to write index(\App\User $user)
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user) : false;
        return view('profiles.profile', compact('user', 'follows'));
    }

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'profilename' => 'required',
            'description' => '',
            'image' => '',
        ]);

        if (request('image')){
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->resize(500,500);
            //do not forget php artisan storage:link
            $image->save();
        }
        else
            $imagePath='';


        auth()->user()->profile->update(array_merge(
            $data,
            ['image'=> $imagePath]
        ));

        return redirect("/profile/{$user->id}");
    }
}
