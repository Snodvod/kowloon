<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kowloon</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
</head>
<body>
<div class="sidebar">
    <ul class="side-nav">
        <li><div id="js-toggle-menu" class="menu"></div></li>
        <li id="js-open-search" class="top"><div class="search"></div><span>Search</span></li>
        <li id="js-open-faq" class="top divider-top"><div class="faq"></div><span>FAQ</span></li>
        <li class="{{ Helpers::isActiveRoute('dogs') }} animal divider-bot"><a href="/categories/1"><div class="dog"></div><span>Dogs</span></a></li>
        <li class="{{ Helpers::isActiveRoute('cats') }} animal"><a href="/categories/2"><div class="cat"></div><span>Cats</span></a></li>
        <li class="{{ Helpers::isActiveRoute('fish') }} animal"><a href="/categories/3"><div class="fish"></div><span>Fish</span></a></li>
        <li class="{{ Helpers::isActiveRoute('birds') }} animal"><a href="/categories/4"><div class="bird"></div><span>Birds</span></a></li>
        <li class="{{ Helpers::isActiveRoute('small') }} animal"><a href="/categories/5"><div class="hamster"></div><span>Small Animals</span></a></li>
    </ul>
    <a href="/" class="kowloon"></a>
</div>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="container">
            <div id="search" class="overlay hidden">
                <div class="row">
                    <div class="col-md-11 offset-md-1">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="advanced" id="js-toggle-filters">
                                    <h4>Advanced search <i class="fa fa-caret-right" aria-hidden="true"></i></h4>
                                </div>
                            </div>
                            <div id="js-close-search" class="exit col-md-1 offset-md-8 text-xs-center">
                                <div class="icon-close"></div>
                                <p>esc</p>
                            </div>
                        </div>
                        <div class="filters row">
                            <div class="col-md-6 category">
                                <h5>Category</h5>
                                @foreach($categories as $category)
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" name="" id="{{$category->id}}"
                                               class="custom-control-input js-cats">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">{{$category->name}}</span>
                                    </label>
                                @endforeach
                            </div>
                            <div class="col-md-5 price">
                                <h5>Price range</h5>
                                <div class="slider js-slider"></div>
                                <div class="row">
                                    <div class="col-md-4 min"><span class="euro">€</span> <span class="js-min">1</span></div>
                                    <div class="col-md-4 text-xs-center">-</div>
                                    <div class="col-md-4 max"><span class="euro">€</span> <span class="js-max">9999</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row search-block">
                            <div class="col-md-11">
                                <form role="search" class="typeahead">
                                    <div class="form-group">
                                        <input type="search" class="form-control search-input" autofocus
                                               id="js-search-input" name="q" placeholder="Just start typing to search"
                                               autocomplete="off">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay hidden" id="faq">
                <div class="row">
                    <div class="col-md-11 offset-md-1">
                        <div class="row">
                            <div id="js-close-faq" class="text-xs-center exit offset-md-11 col-md-1">
                                <div class="icon-close"></div>
                                <p>esc</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 faq-head"><h1>Frequently Asked Questions</h1></div>
                        </div>
                        <div class="row">
                            <div class="col-md-11">
                                <form role="search" class="typeahead">
                                    <div class="form-group">
                                        <input type="search" class="form-control faq-search search-input" autofocus
                                               id="js-search-input" name="q" placeholder="Search on keyword"
                                               autocomplete="off">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="faq-static">
                            @foreach($faqs as $faq)
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="card card-block">
                                            <h4 class="card-title">{{$faq->question}}</h4>
                                            <p class="card-text">{{$faq->answer}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
</div>

</body>
<script src="{{asset('js/app.js')}}"></script>
<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script src="https://use.fontawesome.com/cbad98e1c7.js"></script>

</html>