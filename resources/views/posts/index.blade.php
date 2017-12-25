@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Блог</div>
                <div class="panel-body">
                    @foreach ($posts as $post)
                    <article>
                        <h4>{{ $post->head}}</h4>
                        <div class="body">{!! $post->text !!}</div>
                        <div class="center-block">Дата создания: {{ $post->created_at}}</div>
                        <div class="center-block">Дата изменения: {{ $post->updated_at}}</div>
                        <div class="center-block">Автор: {{ $post->getUsername($post->author)}}</div>
                        <div class="center-block">Всего лайков: {{ $post->getCountPostLikes($post->id)}}</div>
                        @if($post->getLikes($post->id))
                        <form method="post" action="/likes/{{ $post->getLikes($post->id)}}">
                            {{ method_field('DELETE') }}
                            @else
                            <form method="post" action="/likes">
                            <input type="hidden" name="post_id" value="{{ $post->id}}">
                            @endif
                            {{ csrf_field()}}
                            <a class="btn btn-default" href="/posts/{{ $post->id}}" role="button">Читать...</a>
                            @if(auth()->check())
                            @if($post->getLikes($post->id))
                            <button type="submit" class="btn btn-danger">{{ $post->count_like}} Мне не нравится</button>
                            @else
                            <button type="submit" class="btn btn-success">{{ $post->count_like}} Мне нравится</button>
                            @endif
                            @endif
                        </form>
                    </article>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection