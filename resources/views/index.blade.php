@extends('master')

@section('content')
    <div class="index">
        <div class="row">
            <div class="col-md-12 slider">
                <div class="csslider">
                    <input type="radio" name="slides" id="slides_1" checked/>
                    <input type="radio" name="slides" id="slides_2"/>
                    <input type="radio" name="slides" id="slides_3"/>
                    <ul>
                        <li style="background:linear-gradient(rgba(255, 0, 67, 0.45),rgba(255, 0, 67, 0.45)),url({{asset('img/headerdog.png')}}) 50%;"></li>
                        <li style="background:linear-gradient(rgba(255, 0, 67, 0.45),rgba(255, 0, 67, 0.45)),url({{asset('img/bear.jpg')}}) 50%;"></li>
                        <li style="background:linear-gradient(rgba(255, 0, 67, 0.45),rgba(255, 0, 67, 0.45)),url({{asset('img/stokstaart.jpg')}}) 50%;"></li>
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
            <div class="col-md-offset-1 col-lg-10">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="info text-center"><p>Integer vestibulum, lectus nec aliquet consequat, leo tortor
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
                            <div class="text-center">Dogs</div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="col-md-2">
                            <div class="animal cat"></div>
                            <div class="text-center">Cats</div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="col-md-2">
                            <div class="animal fish"></div>
                            <div class="text-center">Fish</div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="col-md-2">
                            <div class="animal bird"></div>
                            <div class="text-center">Birds</div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="col-md-2">
                            <div class="animal hamster"></div>
                            <div style="font-size: 15px;" class="text-center">Small <br>animals</div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="col-md-2">
                            <div class="animal other"></div>
                            <div class="text-center">Other</div>
                        </div>
                    </a>
                </div>
                <div class="row hot">
                    <h2>Hot items.</h2>
                    <div class="col-md-3">Hot item 1</div>
                    <div class="col-md-3">Hot item 1</div>
                    <div class="col-md-3">Hot item 1</div>
                    <div class="col-md-3">Hot item 1</div>
                </div>
            </div>
        </div>
    </div>
@endsection