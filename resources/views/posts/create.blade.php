@extends('layouts.app')
{{--@extends('providers.DynamicBodyParts')--}}
@section('content')
    <div class="container">
        <form action="/post" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                <div class="col-10">
                    <h1 align="center"> Add a new post </h1>
                    <div class="form-group row pt-4">
                        <label for="title" class="col-md-4 col-form-label text-md-right">Post Title</label>

                        <div class="col-md-6">
                            <input id="title"
                            type="text"
                            class="form-control @error('title') is-invalid @enderror"
                            name="title" value="{{ old('title') }}"
                            required autocomplete="title">

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">Post Description</label>

                        <div class="col-md-6">
                            <input id="description"
                            type="text"
                            class="form-control @error('description') is-invalid @enderror"
                            name="description"
                            value="{{ old('description') }}"
                            required autocomplete="description">

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="bodypart" class="col-md-4 col-form-label text-md-right">Body Part</label>
                        <div class="col-md-6">
                            <div>
                                <select name="bodypart" id="bodypart" class="selectpicker form-control" data-style="select-with-transition" title="bodypart">
                                    <option>chest</option>
                                    <option>back</option>
                                    <option>shoulders</option>
                                    <option>legs</option>
                                    <option>biceps</option>
                                    <option>triceps</option>
                                    <option>abs</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>

                        <div class="col-md-6">
                            <input id="image" type="file" class="form-control-file" name="image">

                            @error('image')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4"></div>
                        <div class="pl-3">
                            <button class="btn-primary">Add New Post</button>
                        </div>

                    </div>

                </div>
            </div>
        </form>
    </div>

@endsection
