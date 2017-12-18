@extends ('layout.index')
@section ('content')

<div class="row">
    @foreach ($posts as $post)
    <div class="col-md-4">
        <h2>{{ $post->head}}</h2>
        <p>{!! $post->text !!}</p>
        <p>Запись создана {{ $post->created_at}}</p>
        <p>Последний раз изменялась{{ $post->updated_at}}</p>
        <p>Автор {{ $post->author}}</p>
        <p><a class="btn btn-default" href="/post/{{ $post->id}}" role="button">Читать...</a></p>
    </div>
    @endforeach
</div>

@endsection