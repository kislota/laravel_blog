@extends('layouts.app')

@include('layouts.sidebar')

@section('content')
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
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Отправить</button>
                        </div>
                        @include('components.errors')
                    </form>
                </div>
            </div>
@endsection