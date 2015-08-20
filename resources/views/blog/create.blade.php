@extends('layouts.default')



@section('content')

    <h2>Create a Blog Post</h2>


    {!! Form::open(array('route' => 'blog.store')) !!}
       @include('partials.forms.blogForm')
    {!! Form::close() !!}



    
@stop