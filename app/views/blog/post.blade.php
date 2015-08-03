@extends('layout')
@section('title'){{ e($post->title) }}@stop
@section('description'){{ e($post->meta_description) }}@stop
@section('author'){{ User::find($post->user_id)->firstname }} {{ User::find($post->user_id)->lastname }}@stop
@section('keywords'){{ e($post->meta_keywords) }}@stop
@section('url'){{ Request::url() }}@stop
@section('content')
<main id="terms" class="inner-bottom-md">
    <div class="container">
        <section class="section section-page-title">
            <div class="page-header">
                <h2 class="page-title">{{ $post->title }}</h2>
            </div>
        </section>
        <section class="section intellectual-property inner-bottom-xs">
            <p>{{ e($post->meta_description) }}{{ HTML::decode($post->content) }}</p>
        </section>

        <div id="disqus_thread"></div>
        <script type="text/javascript">
            /* * * CONFIGURATION VARIABLES * * */
            var disqus_shortname = 'ukrtvsat';
            
            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
    </div>
</main>
@stop