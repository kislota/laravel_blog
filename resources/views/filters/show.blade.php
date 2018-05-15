@extends('layouts.app')

@include('layouts.sidebar')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Фильтр слов</div>
        <div class="panel-body">
            <h3>{{ $filter->text }}</h3>
            <form method="post" action="/filters/{{ $filter->id}}">
                {{ csrf_field()}}
                {{ method_field('DELETE') }}
                @if(auth()->check())
                    <a href="/filters/{{ $filter->id}}/edit" class="btn btn-success" role="button">Изменить</a>
                    <button type="submit" class="btn btn-danger">Удалить</button>
                @endif
            </form>
        </div>
    </div>
@endsection