@extends ('layout.index')
@section ('content')
<div class="row">
    <div class="card">
        <p class="card-text"><h3>{{ $post->head}}</h3></р>
        <img src="{{$url = Storage::url('images/'.$post->img)}}" alt="{{$post->img}}">
        <p>{!! $post->text !!}</p>
        <p>Автор {{ $post->author}}</p>
        <p>Запись создана {{ $post->created_at}}</p>
        <p>Последний раз изменялась{{ $post->updated_at}}</p>
        <form method="post" action="/post/{{ $post->id}}">
            {{ csrf_field()}}
            {{ method_field('DELETE') }}
            <a href="/post/{{ $post->id}}/edit" class="btn btn-success" role="button">Изменить</a>
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
    </div>
</div>
@endsection