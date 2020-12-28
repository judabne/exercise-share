@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-start">
            <img src="{{$user->profile->profileImage()}}" class=" col-3">
            <div class="pl-4 col-8"> <h1>{{ $user->profile->profilename ?? '' }}</h1>
             {{ $user-> profile-> description }} </div>
             <div class="col-1">
                 @if(Auth::user())
                    @if((Auth::user()->id)!=$user->id)
                        <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button> {{--follows is passed in from the profiles controller--}}
                    @endif
                @endif
            </div>
    </div>

    <hr style="background-color:dimgray; height: 2px">
<div>


    @foreach($user->posts as $post)

        <div class="row">
            <div class="col-4">
                <img src="/storage/{{ $post->image }}" class = "w-100">
            </div>
            <div>
                <div class="row pl-3 align-items-center">
                    <div class="h2">{{ $post -> title}}</div> <span class="pl-3">{{$post-> bodypart}}</span>
                </div>
                {{ $post->description}}
            </div>
        </div>

        <hr style="width: 75%" align="left">
    @endforeach

@endsection
