@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Products</h2>
            <a href="/admin/products/create" class="btn create btn-primary">Create new</a>
            <table class="cell-border stripe hover order-column products" id="js-products-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td class="price">€ {{$product->price}}</td>
                        <td>{{$product->description}}</td>
                        <td class="category text-xs-center">@if($product->category->name != 'other')<img height="50"
                                                                                                         width="40"
                                                                                                         src="/img/{{$product->category->image}}"
                                                                                                         alt="">
                            <br>@endif{{$product->category->name}}</td>
                        <td class="text-xs-center"><a class="edit" href="/admin/products/{{$product->id}}/edit"><i
                                        class="fa fa-pencil-square-o"></i></a></td>
                        <td class="text-xs-center"><i class="js-delete-product fa fa-trash-o" data-id="{{$product->id}}"></i>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div id="hot-errors" class="row">
        <div class="col-md-6 offset-md-3">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <h4>Woops, some errors...</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div class="hot row">
        <div class="col-md-12">
            <h2>Hot Items</h2>
        </div>
        <form action="/admin/products/hot" method="post">
            {{csrf_field()}}
            @foreach($hots as $hot)
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="hot{{$hot->hot_order}}">Hot item {{$hot->hot_order}}</label>
                        <select name="hots[]" class="form-control" id="hot{{$hot->hot_order}}">
                            @foreach($products as $product)
                                @if($hots->contains($product->id) &&  $product->id == $hot->id)
                                    <option selected value="{{$product->id}}">{{$product->name}}</option>
                                @elseif(!$hots->contains($product->id))
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            @endforeach
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>

    </div>
@endsection