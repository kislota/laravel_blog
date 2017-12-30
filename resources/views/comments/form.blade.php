@if (auth()->check())
<article>
    <form method="post" action="/comments">
        {{ csrf_field()}}
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <input type="hidden" name="user_id" value="{{auth()->id()}}">
        <div class="form-group">
            <label for="text">Комментарий</label>
            <textarea class="form-control" id="comments" name="text"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
</article>
@endif