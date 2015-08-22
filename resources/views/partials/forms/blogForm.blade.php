
<div class="form-group">
    {!! Form::label('title', 'title') !!}
    {!! Form::text('title') !!}
</div>

<div class="form-group">
    {!! Form::textarea('body') !!}
</div>

<div class="form-group">

    {{-- set a value if unpublished to update model BETTER FIX LATER--}}
    <input type="hidden" name="published" value="0">
    {{--  --}}
    
    {!! Form::label('published', 'published') !!}
    {!! Form::checkbox('published') !!}
</div>

<div>
    {!! Form::select('tag_list[]', $alltags, null, ['multiple']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Publish') !!}
</div>

@include('partials.forms.errors')