@extends('layouts.app')

@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th>Profile</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($details as $profile)
        <tr>
            <td>
                <a href="/profile/{{$profile->user_id}}"><span class="text-dark font-weight-bold">{{$profile->profilename}}</span></a>
            </td>
            <td>{{$profile->description}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
