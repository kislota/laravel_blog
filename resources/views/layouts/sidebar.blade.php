@section('sidebar')
    @auth
    <div class="panel panel-default">
        <div class="panel-heading">Профиль</div>
        <div class="panel-body">
            <div class="center-block" style="text-align: center">
            <?php echo auth()->user()->name;?>
            </div>
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
            <a class="btn btn-default" href="">Редактировать профиль</a>
            </div>
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
            <a class="btn btn-default" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Выход
            </a>
            </div>
        </div>
    </div>
    @endauth
    <div class="panel panel-default">
        <div class="panel-heading">Популярные записи</div>
        <div class="panel-body">
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Последние записи</div>
        <div class="panel-body">
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Последние комментарии</div>
        <div class="panel-body">
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Новые пользователи</div>
        <div class="panel-body">
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Теги</div>
        <div class="panel-body">
        </div>
    </div>
@endsection