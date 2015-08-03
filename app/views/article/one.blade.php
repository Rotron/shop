@extends('layout')
@section('title'){{ e($article->title) }}@stop
@section('description'){{ e($article->meta_description) }}@stop
@section('author'){{ User::find($article->user_id)->firstname }} {{ User::find($article->user_id)->lastname }}@stop
@section('keywords'){{ e($article->meta_keywords) }}@stop
@section('url'){{ Request::url() }}@stop
@section('content')
<main id="terms" class="inner-bottom-md">
    <div class="container">
        <section class="section section-page-title">
            <div class="page-header">
                <h2 class="page-title">{{ $article->title }}</h2>
            </div>
        </section>
        <section class="section intellectual-property inner-bottom-xs">
            <p>{{ $article->content }}</p>
        </section>
    </div>
</main>
@stop