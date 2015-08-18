@extends('layouts.default')




@section('content')
    <h2>Single Blog Yall</h2>


    <h2> {{ $post->title }} </h2>

    <p> {{ $post->body }} </p>

    <p>Published {{ $post->published}}</p>
@stop