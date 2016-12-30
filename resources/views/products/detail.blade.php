@extends('master')

@section('content')
    <div class="product-detail">
        <div class="row">
            <div class="col-md-4 offset-md-4 logo ">
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="row info">
                    <div class="col-md-6 images">
                        <div class="row">
                            <div class="col-md-12">
                                <div style="background-image: url({{asset('img/' . $product->images()->first()->image)}} );"
                                     class="big">
                                </div>

                                @foreach($product->images()->get() as $image)
                                    <div style="background-image: url({{asset('img/' . $image->image)}} );"
                                         class="col-md-4 thumb"></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text">
                        <div class="breadcrumbs">
                            <div class="logo"></div>
                            <span class="ribbon category">{{$product->category->name}}</span>
                            <span class="ribbon tagname">{{$product->tags()->first()->name}}</span>
                        </div>
                        <h2>{{$product->name}}</h2>
                        <h5 class="price">€ {{$product->price}}</h5>
                        <div class="description">
                            <h5>Description</h5>
                            <p>{{$product->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection