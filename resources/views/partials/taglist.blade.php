@inject('tags', 'App\Tag')

<ul>
    @foreach ($tags->active() as $tag) 
        <a href="/blog/?tags={{$tag->name}}"><li>{{ $tag->name }}</li></a>
    @endforeach
</ul>