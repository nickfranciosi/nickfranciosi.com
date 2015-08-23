@extends('layouts.default')




@section('content')
    <h2>Blog Index</h2>


    @foreach ($posts as $post)
        <a href="/blog/{{ $post->slug }}">
            <h3>{{ $post->title }}</h3>
        </a>
    @endforeach


    @include('partials.taglist')
@stop