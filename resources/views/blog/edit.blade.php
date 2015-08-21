@extends('layouts.default')



@section('content')

    <h2>Edit a Blog Post</h2>

    @foreach ($tags as $tag)
      
      <p>{{ $tag->name }}</p>  
    @endforeach


    {!! Form::model($post, array('method' => 'put','route' => array('blog.update', $post->id))) !!}

       @include('partials.forms.blogForm')
       
    {!! Form::close() !!}

    {!! Form::open(array('route' => array('blog.destroy', $post->id), 'method' => 'delete')) !!}
        <button type="submit" class="btn btn-danger btn-mini">Delete</button>
    {!! Form::close() !!}

@stop