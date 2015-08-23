
<div class="form-group">
    {!! Form::label('title', 'title') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('published_at', 'Publish On') !!}
    {!! Form::input('date', 'published_at', null, ['class' => 'form-control']) !!}
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