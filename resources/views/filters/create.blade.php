@extends('layouts.app')

@include('layouts.sidebar')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Фильтр слов</div>
        <div class="panel-body">
            <form method="post" action="{{route('filters.store')}}">
                {{ csrf_field()}}
                <div class="form-group">
                    <label for="filters">Введите слово</label>
                    <input type="text" class="form-control" id="filters" name="text">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Отправить</button>
                </div>
                @include('components.errors')
            </form>
        </div>
    </div>
@endsection