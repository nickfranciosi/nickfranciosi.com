@extends('layouts.default')


@section('content')
    <h2>Admin Index Page</h2>

    @foreach ($posts as $post)
        <a href="/blog/{{ $post->slug }}">
            <h3>{{ $post->title }}</h3>
            <p> {{ $post->published_at}} </p>
            <ul>
                @foreach ($post->tags as $tag)
                    <a href="/blog?tags={{$tag->name}}"><li>{{$tag->name}}</li></a>
                @endforeach
            </ul>
        </a>
    @endforeach
@stop