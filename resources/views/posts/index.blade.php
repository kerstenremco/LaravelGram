@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
    <div class="row">
        <div class="col-6 offset-3">
            <a href="/profile/{{$post->user->id}}"><img src="/storage/{{$post->image}}" alt="" class="w-100"></a>
        </div>
    </div>
    <div class="row pt-2 pb-4">
        <div class="col-6 offset-3">
            <div>
                <p>
                    <div class="font-weight-bold"><a href="/profile/{{$post->user->id}}"
                            class="text-dark">{{$post->user->username}}</a></div>
                    {{$post->caption}}
                </p>
            </div>
        </div>
        </div>
        @endforeach
        <div class="row col-12 d-flex justify-content-center">
            {{$posts->links()}}
        </div>
    </div>
    @endsection
