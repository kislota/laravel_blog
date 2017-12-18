
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

        <title>Блог</title>

        <!-- Bootstrap core CSS -->
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">

        <!-- подключаем стили Summernote -->

        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.css" rel="stylesheet">
        `
        <!-- Custom styles for this template -->
        <link href="/css/jumbotron.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy this line! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        @include('layout.nav')

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="container">
            <div class="container">
                <h1>Блог</h1>
            </div>
        </div>

        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                @yield('content')
            </div>
            <hr>
            @include ('layout.footer')

            </body>
            <!-- подключаем jquery -->

            <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

            <!-- подключаем bootstrap.js -->

            <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

            <!-- подключаем сам summernote -->

            <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.js"></script>

            <script>

                $(document).ready(function () {

                    $('#text').summernote();

                });

            </script>
</html>