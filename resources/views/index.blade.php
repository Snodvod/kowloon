@extends('master')

@section('content')
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