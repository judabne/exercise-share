@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')

        <div class="row">
            <h1>Edit Profile</h1>
        </div>

        <div class="form-group row">
            <label for="profilename" class="col-md-4 col-form-lable">Display Name</label>

            <input  id = "profilename"
                    type = "text"
                    class="form-control"
                    name="profilename"
                    value="{{ old('profilename') ?? $user->profile->profilename }}"
                    autocomplete="profilename" autofocus>

        @if ($errors->has('profilename'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('profilename') }}</strong>
            </span>
        @endif

        </div>

        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-lable">Description</label>

            <input  id = "description"
                    type = "text"
                    class="form-control"
                    name="description"
                    value="{{old('description')?? $user->profile->description }}"
                    autocomplete="description" autofocus>

        @if ($errors->has('description'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
        </div>

        <div class="row">
            <label for="image" class="col-md-4 col-form-label">Profile Image</label>

            <input type="file" class="form-control-file" id="image" name="image">

            @if($errors->has('image'))
                <strong>{{$errors->first('image')}}</strong>
            @endif
        </div>

        <div class="row pt-4">
            <button class="btn btn-primary">Update Profile</button>
        </div>


    </form>
</div>
@endsection
