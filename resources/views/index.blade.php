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
        <div class="row">
            <div class="col-md-12 slider">
                <div class="csslider">
                    <input type="radio" name="slides" id="slides_1" checked/>
                    <input type="radio" name="slides" id="slides_2"/>
                    <input type="radio" name="slides" id="slides_3"/>
                    <ul>
                        <li style="background:linear-gradient(rgba(255, 0, 67, 0.45),rgba(255, 0, 67, 0.45)),url({{asset('img/headerdog.png')}});"></li>
                        <li style="background:linear-gradient(rgba(255, 0, 67, 0.45),rgba(255, 0, 67, 0.45)),url({{asset('img/bear.jpg')}});"></li>
                        <li style="background:linear-gradient(rgba(255, 0, 67, 0.45),rgba(255, 0, 67, 0.45)),url({{asset('img/stokstaart.jpg')}});"></li>
                    </ul>
                    <div class="navigation">
                        <div>
                            <label for="slides_1"></label>
                            <label for="slides_2"></label>
                            <label for="slides_3"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                    <a href="#">
                        <div class="col-md-2">
                            <div class="animal dog"></div>
                            <div class="text-xs-center">Dogs</div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="col-md-2">
                            <div class="animal cat"></div>
                            <div class="text-xs-center">Cats</div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="col-md-2">
                            <div class="animal fish"></div>
                            <div class="text-xs-center">Fish</div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="col-md-2">
                            <div class="animal bird"></div>
                            <div class="text-xs-center">Birds</div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="col-md-2">
                            <div class="animal hamster"></div>
                            <div style="font-size: 15px;" class="text-xs-center">Small <br>animals</div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="col-md-2 last">
                            <div class="animal other"></div>
                            <div class="text-xs-center">Other</div>
                        </div>
                    </a>
                </div>
                <div class="row hot">
                    <div class="col-md-10">
                        <h2>Hot items.</h2>
                    </div>
                    <div class="col-md-3">
                        <div class="item">
                            <div class="img"><div class="overlay"></div></div>
                            <div class="title">Cooling mat</div>
                            <div class="price">€91,25</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item">
                            <div class="img"><div class="overlay"></div></div>
                            <div class="title"></div>
                            <div class="price"></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item">
                            <div class="img"><div class="overlay"></div></div>
                            <div class="title"></div>
                            <div class="price"></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item">
                            <div class="img"><div class="overlay"></div></div>
                            <div class="title"></div>
                            <div class="price"></div>
                        </div>
                    </div>
                    <div class="visit col-md-2 offset-md-10">
                        <a href="#">Visit the store</a>
                    </div>
                </div>
                <div class="row newsletter">
                    <div class="col-md-7">
                        <div class="discover">
                            <h2>discover amazing Kowloon deals!</h2>
                            <p>Only in our newsletter</p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="subscribe">
                            <h5>Subscribe to our newsletter</h5>
                            <p>And get rekt.</p>
                            <form action="/user/newsletter" method="POST">
                                {{csrf_field()}}
                                <input type="text" name="email" id="email" placeholder="name@domain.com">
                                <input class="submit" type="submit" value="OK">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection