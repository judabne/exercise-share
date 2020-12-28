@extends('layouts.app')

@section('content')
    {{--$user = Auth::user()->user;--}}
    <div class="containter">
        <div class="row justify-content-start">
            <div class="col-xs-2 col-md-2 pl-5">
                <a href="/profile/{{ auth()->user()->id }}/edit">Edit Profile</a>
            </div>
            <div class="col-xs-2 col-md-2 pl-5">
                <a href="/post/create">Add a post</a>
            </div>
        </div>
        <hr style="background-color:dimgray; height: 2px">
    </div>


    @foreach($posts as $post)
    <div class="row">
        <div class="col-4">
            <img src="/storage/{{ $post->image }}" class = "w-100">
        </div>
        <div>
        <div class="row pl-3"><a href="/profile/{{$post->user_id}}"><span class="text-dark font-weight-bold">{{ $post-> user -> profile -> profilename }}</span></a></div>
            <div class="row pl-3 align-items-center">
                <div class="h2">{{ $post -> title}}</div> <span class="pl-3">{{$post-> bodypart}}</span>
            </div>
            {{ $post->description}}
        </div>
    </div>

    <hr style="width: 75%" align="left">
    @endforeach

@endsection
