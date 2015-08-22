
<div class="form-group">
    {!! Form::label('title', 'title') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">

    {{-- set a value if unpublished to update model BETTER FIX LATER--}}
    <input type="hidden" name="published" value="0">
    {{--  --}}
    
    {!! Form::label('published', 'published') !!}
    {!! Form::checkbox('published') !!}
</div>

<div class="form-group">
    {!! Form::select('tag_list[]', $alltags, null, ['id' => 'tag_list','multiple', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Publish') !!}
</div>

@include('partials.forms.errors')

@section('scripts')
    <script type="text/javascript">
        $('#tag_list').select2({
            placeholder: "Select a tag",
            tags: true,
            tokenSeparators: [',', ' ', '\n', '\t']
        });
    </script>
@stop