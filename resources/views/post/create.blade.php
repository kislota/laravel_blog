@extends ('layout.index')
@section ('content')
<h3>Новый пост</h3>

<form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
    {{ csrf_field()}}
    <div class="form-group">
        <label for="head">Заголовок</label>
        <input type="text" class="form-control" id="head" name="head">
    </div>
    <div class="form-group">
        <label for="text">Текст</label>
        <textarea class="form-control" id="text" name="text"></textarea>
    </div>
    <div class="form-group">
        <label for="author">Автор</label>
        <input type="text" class="form-control" id="author" name="author">
    </div>
    <div class="form-group">
        <label for="img">Картинка</label>
        <input type="file" id="img" name="img">
    </div>
    <button type="submit" class="btn btn-default">Отправить</button>
</form>

@endsection