<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ secure_asset('js/remodal.js') }}"></script>
    <script src="{{ secure_asset('js/foods.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
    <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/remodal.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/remodal-default-theme.css') }}">
    <link rel="apple-touch-icon" sizes="152×152" href="https://www.dropbox.com/s/6tf5sro6co45dr2/apple-touch-icon.png">
    <title>ぱくぱく日記</title>
</head>
<header class="container-fluid header-bg-color">
    <a href="/"><div class="text-center h1 text-light">ぱくぱく日記</div></a>
</header>
<body>
    @yield('content')
</body>
<footer class="footer-bg-color mt-5"></footer>
</html>