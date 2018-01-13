@section('sidebar')
    @auth
    <div class="panel panel-default">
        <div class="panel-heading">Профиль</div>
        <div class="panel-body">
            <?php echo auth()->user()->name;?>
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
@endsection