@extends('layout')
@section('content')
<main id="blog" class="inner-bottom-xs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="posts sidemeta">
                    @foreach($articles as $article)
                    <div class="post format-image row">
                        <div class="col-md-3">
                            <a href="{{ asset("article/$article->link") }}"><img src="{{ asset("uploads/images/articles/$article->id.jpg") }}" alt="{{ $article->title }}"></a>
                        </div>
                        <div class="col-md-9">
                            <h2 class="post-title">{{ $article->title }}</h2>
                            <p>{{ $article->description }}</p>
                            <a href="{{ asset("article/$article->link") }}" class="le-button huge">Читать далее</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <hr/>
                {{ $paginate->links() }}
            </div>
        </div>
    </div>
</main>
@stop