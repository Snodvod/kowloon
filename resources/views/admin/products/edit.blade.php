@extends('layouts.app')

@section('content')
    <div class="row edit">
        <h2>Edit product: {{$product->name}}</h2>
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
        <div class="col-md-12">
            <form id="js-product-form" method="POST" action="/admin/products/{{$product->id}}"
                  enctype="multipart/form-data">
                {{ method_field('PUT') }}
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input value="{{$product->name}}" type="text" class="form-control" id="name"
                                           name="name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input value="{{$product->price}}" type="number" step="0.01" min="0"
                                           class="form-control"
                                           id="price" name="price">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="category">Name</label>
                                    <select class="categories form-control" id="category" name="category_id">
                                        @foreach($categories as $category)
                                            @if($category->id == $product->category->id)
                                                <option selected value="{{$category->id}}">{{$category->name}}</option>
                                            @else
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea rows="5" class="form-control" id="description" name="description">{{$product->description}}
                            </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row tags">
                            <div class="col-md-12">
                                <div class="tag-title">Tags</div>
                                @foreach($tags as $tag)
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            @if($product->tags->contains($tag->id))
                                                <input class="form-check-input" checked type="checkbox"
                                                       name="tags[]"
                                                       value="{{$tag->id}}"> {{$tag->name}}
                                            @else
                                                <input class="form-check-input" type="checkbox" name="tags[]"
                                                       value="{{$tag->id}}"> {{$tag->name}}
                                            @endif
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    <div class="col-md-6 image-wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label" for="images">Images</label>
                                    <input class="form-control-file" name="images[]" id="images" type="file"
                                           aria-describedby="fileHelp" multiple>
                                    <small id="fileHelp" class="form-text text-muted">You can add multiple images at
                                        once
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="row thumbs">
                            @foreach($product->images as $image)
                                <div data-id="{{$image->id}}" class="thumb-col col-md-4">
                                    <img class='thumb' src='/storage/{{$image->image}}'/>
                                    <br/><span class='remove'>Delete <i class='fa fa-trash-o'></i></span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection