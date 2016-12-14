<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kowloon</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://use.fontawesome.com/cbad98e1c7.js"></script>
</head>
<body>
<div class="sidebar">
    <ul class="side-nav">
        <li><div id="js-toggle-menu" class="menu"></div></li>
        <li><div class="search"></div><span>Search</span></li>
        <li class="divider-top"><div class="faq"></div><span>FAQ</span></li>
        <li class="animal divider-bot"><div class="dog"></div><span>Dogs</span></li>
        <li class="animal"><div class="cat"></div><span>Cats</span></li>
        <li class="animal"><div class="fish"></div><span>Fish</span></li>
        <li class="animal"><div class="bird"></div><span>Birds</span></li>
        <li class="animal"><div class="hamster"></div><span>Small Animals</span></li>
    </ul>
    <div class="kowloon"></div>
</div>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="container">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>