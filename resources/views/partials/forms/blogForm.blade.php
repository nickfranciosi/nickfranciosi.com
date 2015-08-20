<div class="form-group">
    {!! Form::label('title', 'title') !!}
    {!! Form::text('title') !!}
</div>

<div class="form-group">
    {!! Form::textarea('body') !!}
</div>

<div class="form-group">
    {!! Form::label('published', 'published') !!}
    {!! Form::checkbox('published') !!}
</div>

<div class="form-group">
    {!! Form::submit('Publish') !!}
</div>

@include('partials.forms.errors')