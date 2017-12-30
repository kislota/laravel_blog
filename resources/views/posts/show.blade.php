@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $post->head}}</div>
                <div class="panel-body">
                    <article>
                        <img style="height: 150px;" src="{{$url = Storage::url('images/'.$post->img)}}" alt="{{$post->img}}">
                        <div class="body">{!! $post->text !!}</div>
                        <div class="center-block">Дата создания: {{ $post->created_at}}</div>
                        <div class="center-block">Дата изменения: {{ $post->updated_at}}</div>
                        <div class="center-block">Автор: {{ $post->getUsername($post->author)}}</div>
                        <form method="post" action="/posts/{{ $post->id}}">
                            {{ csrf_field()}}
                            {{ method_field('DELETE') }}
                            @if($post->author == auth()->id() || $post->user_id_like == auth()->id())
                            <a href="/posts/{{ $post->id}}/edit" class="btn btn-success" role="button">Изменить</a>
                            @endif
                            @if($post->author == auth()->id())
                            <button type="submit" class="btn btn-danger">Удалить</button>
                            @endif
                        </form>
                        <hr>
                        @foreach ($post->comments as $comment)
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Автор комментария: {{ $post->getUsername($comment->user_id)}}</h3>
                            </div>
                            <div class="panel-body">
                                {{ $comment->text }}
                            </div>
                        </div>
                        @endforeach
                    </article>
                    <hr>
                    @include('comments.form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection