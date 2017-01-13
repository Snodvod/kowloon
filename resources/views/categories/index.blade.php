@extends('master')

@section('content')
    @include('..partials.slider')
    <div class="category">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumbs">
                            <div class="logo"></div>
                            <span class="ribbon category">{{$category->name}}</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h3>{{$category->name}} articles</h3>
                    </div>
                    <div class="col-md-12 js-open-filters">
                        Filter <i class="fa fa-caret-right"></i>
                    </div>
                    <div id="cat-filters" class="filters row">

                        <form action="/categories/{{$category->id}}/filter" method="post">
                            {{csrf_field()}}
                            <div class="col-md-6 offset-md-1 tags">
                                <h6>Tags</h6>
                                @foreach($tags as $tag)
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" name="tags[]" value="{{$tag->id}}"
                                               class="custom-control-input js-cats">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">{{$tag->name}}</span>
                                    </label>
                                @endforeach
                            </div>
                            <div class="col-md-11 offset-md-1 price">
                                <input type="hidden" name="min" class="form-min">
                                <input type="hidden" name="max" class="form-max">
                                <h6>Price range</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="slider js-slider"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-4 min"><span class="euro">€</span> <span id="filter-min"
                                                                                                    class="js-min">1</span>
                                        </div>
                                        <div class="col-md-4 text-xs-center">-</div>
                                        <div class="col-md-4 max"><span class="euro">€</span> <span id="filter-max"
                                                                                                    class="js-max">9999</span>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-submit">Filter</button>
                            </div>

                        </form>
                    </div>
                    @foreach($products as $product)
                        <div class="col-md-4">
                            <a href="/products/{{$product->id}}">
                                <div style="background-image: url({{asset('storage/' . $product->image)}} );"
                                     class="thumb"><div class="image-overlay"></div></div>
                            </a>
                            <div class="info">
                                <span>{{$product->name}}</span>
                                <span class="pull-right">€ {{$product->price}}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection