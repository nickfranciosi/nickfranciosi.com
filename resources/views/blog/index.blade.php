@extends('layouts.default')




@section('content')
    <h2>Blog Index</h2>


    @foreach ($posts as $post)
        <a href="/blog/{{ $post->id }}">
            <h3>{{ $post->title }}</h3>
        </a>
    @endforeach
@stop