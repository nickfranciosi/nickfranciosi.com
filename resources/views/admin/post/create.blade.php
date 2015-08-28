@extends('layouts.default')



@section('content')

    <h2>Create a Blog Post</h2>


    {!! Form::open(array('route' => 'admin.post.store')) !!}
       @include('partials.forms.blogForm')
    {!! Form::close() !!}



    
@stop