@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Фильтр слов</div>
                <div class="panel-body">
                    <form method="post" action="/filters/{{$filter->id}}">
                        {{ csrf_field()}}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="filters">Введите новое слово</label>
                            <input type="text" class="form-control" id="filters" name="text" value="{{$filter->text}}">
                        </div>
                        <button type="submit" class="btn btn-default">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection