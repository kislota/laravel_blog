@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Фильтр слов</div>
                <div class="panel-body">
                    <h2>Слова которые запрещены</h2>
                    <a href="/filters/create" class="btn btn-success" role="button">Добавить слово</a>
                    <hr>
                    @foreach ($filters as $filter)
                    |<a href="/filters/{{ $filter->id}}">{{ $filter->text }}</a>
                    @endforeach
                    |
                </div>
            </div>
        </div>
    </div>
</div>
@endsection