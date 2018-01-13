@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Новый пост</div>
                <div class="panel-body">
                    <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
                        {{ csrf_field()}}
                        <div class="form-group">
                            <label for="head">Заголовок</label>
                            <input type="text" class="form-control" id="head" name="head" value="{{old('head')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="text">Текст</label>
                            <textarea class="form-control" id="text" name="text" required>{{old('text')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="img">Картинка</label>
                            <input type="file" id="img" name="img" value="{{old('img')}}" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Отправить</button>
                        </div>
                        @include('components.errors')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection