<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kowloon Admin') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="app" class="admin">
    <nav class="navbar">
        <div class="navbar-inner">
            <div class="navbar-brand">
                <h1>Admin panel</h1>
            </div>
            <div class="pull-right">
                <ul class="navbar-nav">
                    <li class="{{ Helpers::areActiveRoutes(['products.index', 'products.edit']) }} nav-item"><a href="/admin/products">Products</a>
                    </li>
                    <li class="{{ Helpers::areActiveRoutes(['faqs.index', 'faqs.edit']) }} nav-item"><a href="/admin/faqs">FAQ</a></li>
                    @if (!Auth::guest())
                        <li class="nav-item">
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container admin">
        @yield('content')
    </div>
</div>

<!-- Scripts -->
<script src="/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script src="https://use.fontawesome.com/cbad98e1c7.js"></script>
<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

</body>
</html>
