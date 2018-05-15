<<<<<<< HEAD
@if(count($errors))
<ul class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
=======
@if(count($errors))
<ul class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
>>>>>>> 10cbb11750688e8928926d6a00b9aa4b33bb755e
@endif