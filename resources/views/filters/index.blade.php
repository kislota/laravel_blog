@extends('layouts.app')

@include('layouts.sidebar')

@section('content')
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
@endsection