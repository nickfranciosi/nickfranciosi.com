@extends('layouts.default')



@section('content')

    <h2>Edit a Blog Post</h2>


    {!! Form::model($post, array('method' => 'put','route' => array('admin.post.update', $post->id))) !!}

       @include('partials.forms.blogForm')
       
    {!! Form::close() !!}

    {!! Form::open(array('route' => array('admin.post.destroy', $post->id), 'method' => 'delete')) !!}
        <button type="submit" class="btn btn-danger btn-mini">Delete</button>
    {!! Form::close() !!}

@stop