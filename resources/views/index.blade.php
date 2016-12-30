@extends('master')

@section('content')
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
                        <div class="slider" id="js-slider"></div>
                        <div class="row">
                            <div class="col-md-4 min"><span class="euro">€</span> <span id="js-min">1</span></div>
                            <div class="col-md-4 text-xs-center">-</div>
                            <div class="col-md-4 max"><span class="euro">€</span> <span id="js-max">9999</span>
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
    <div class="index">
        @if($new)
            <div class="cookie row">
                <div class="col-md-12">

                    <div class="col-md-1 offset-md-2">
                        <div class="bone"></div>
                    </div>
                    <div class="col-md-6">
                        <h2>Cookies</h2>
                        <p>Hey hallo we gebruiken cookies, accept please!</p>
                        <button id="js-close-cookie" class="btn">Ok, verder surfen</button>
                    </div>
                </div>
            </div>
        @endif
        @include('.partials.slider')
        <div class="row">
            <div class="offset-md-1 col-lg-10">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="info text-xs-center"><p>Integer vestibulum, lectus nec aliquet consequat, leo tortor
                                vestibulum nunc, ac vestibulum tortor nibh facilisis nisl.
                                Donec dictum ullamcorper nisi, ac mollis purus fermentum non. Cras euismod nisi nulla,
                                fringilla egestas turpis euismod vitae.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla turpis orci, posuere ut
                                semper eu, pulvinar ut libero.</p></div>
                    </div>
                </div>
                <div class="row animals">
                    @foreach($categories as $category)
                        @if($category->id == 6)
                            <div class="col-md-2" style="border: none;">
                                <a href="#">
                                    <div class="cat{{$category->id}} animal"
                                         style="background-image: url({{asset('img/' . $category->image)}})"></div>
                                    <div class="cat{{$category->id}} text-xs-center">{{$category->name}}</div>
                                </a>
                            </div>
                        @else
                            <div class="col-md-2">
                                <a href="">
                                    <div class="cat{{$category->id}} animal"
                                         style="background-image: url({{asset('img/' . $category->image)}})"></div>
                                    <div class="cat{{$category->id}} text-xs-center">{{$category->name}}</div>
                                </a>
                            </div>
                        @endif

                    @endforeach
                </div>
                <div class="row hot">
                    <div class="col-md-10">
                        <h2>Hot items.</h2>
                    </div>
                    @foreach($hotItems as $item)
                        <div class="col-md-3">
                            <div class="item">
                                <a href="/products/{{$item->id}}">
                                    <div class="img" style="background-image: url({{asset('img/' . $item->images()->first()->image)}})">
                                        <div class="image-overlay"></div>
                                    </div>
                                    <div class="title">{{$item->name}}</div>
                                    <div class="price">€{{$item->price}}</div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <div class="visit col-md-2 offset-md-10">
                        <a href="#">Visit the store</a>
                    </div>
                </div>
                @include('partials.footer')
            </div>
        </div>
    </div>
@endsection