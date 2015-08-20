@extends('layouts.default')




@section('content')
    <h2>Single Blog Yall</h2>


    <h2> {{ $post->title }} </h2>

    <p> {{ $post->body }} </p>

    <p>Published {{ $post->published}}</p>

    <div class="admin-buttons">
        <a class="btn" href="/blog/{{$post->id}}/edit">Edit</a>
    </div>

    <div id="disqus_thread"></div>
@stop

@section('scripts')

    
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES * * */
        var disqus_shortname = 'nickfranciosisblog';
        
        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
@stop