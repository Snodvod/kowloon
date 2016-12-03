<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kowloon</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <nav class="navbar navbar-default" role="navigation">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse">
                    <div class="panel-heading">Sidebar22</div>
                    <ul class="nav nav-stacked">
                        <li class="active"><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                    </ul>


                </div><!-- /.navbar-collapse -->
            </nav>

        </div><!--/end left column-->

        <div class="col-md-10">
        </div>
    </div>
@yield('content')
</div>
</body>
</html>