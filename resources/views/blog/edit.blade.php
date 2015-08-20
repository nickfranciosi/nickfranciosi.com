@extends('layouts.default')



@section('content')

    <h2>Edit a Blog Post</h2>


    {!! Form::model($post, array('method' => 'put','route' => array('blog.update', $post->id))) !!}

       @include('partials.forms.blogForm')
       
    {!! Form::close() !!}


@stop