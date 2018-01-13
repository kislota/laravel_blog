@if (auth()->check())
<article>
    <form method="post" action="/comments">
        {{ csrf_field()}}
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <input type="hidden" name="user_id" value="{{auth()->id()}}">
        <div class="form-group">
            <label for="text">Комментарий</label>
            <textarea class="form-control" id="comments" name="text" required>{{old('text')}}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Отправить</button>
        </div>
        @include('components.errors')
    </form>
</article>
@elseif(auth()->guest())
<article>
    <div>Что бы оставить комментарий необходимо <a href="{{ route('login') }}">войти</a> или <a href="{{ route('register') }}">зарегистрироваться</a></div>
</article>
@endif