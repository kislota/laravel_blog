@extends ('layout.index')
@section ('content')
<h3>Изменить</h3>

<form method="post" action="/post/{{$post->id}}" enctype="multipart/form-data">
    {{ csrf_field()}}
    {{ method_field('PUT') }}
    <div class="form-group">
        <label for="head">Заголовок</label>
        <input type="text" class="form-control" id="head" name="head" value="{{$post->head}}">
    </div>
    <div class="form-group">
        <label for="text">Текст</label>
        <textarea class="form-control" id="text" name="text">{!! $post->text !!}</textarea>
    </div>
    <div class="form-group">
        <label for="author">Автор</label>
        <input type="text" class="form-control" id="author" name="author" value="{{$post->author}}">
    </div>
    <div class="form-group">
        <label for="img_new">Картинка</label>
        <input type="file" id="img_new" name="img_new">
        <input type="hidden" name="img" value="{{$post->img}}">
    </div>
    <button type="submit" class="btn btn-default">Отправить</button>
</form>

@endsection