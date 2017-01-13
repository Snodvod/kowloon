@extends('layouts.app')

@section('content')
    <div class="row new">
        <h2>Add new product</h2>
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
            <form id="js-product-form" method="POST" action="/admin/products"
                  enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input value="{{old('name')}}" type="text" class="form-control" id="name"
                                           name="name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input value="{{old('price')}}" type="number" step="0.01" min="0"
                                           class="form-control"
                                           id="price" name="price">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="category">Name</label>
                                    <select class="categories form-control" id="category" name="category_id">
                                        @foreach($categories as $category)
                                            @if($category->id == old('category_id'))
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
                                    <textarea rows="5" class="form-control" id="description"
                                              name="description">{{old('description')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row tags">
                            <div class="col-md-12">
                                <div class="tag-title">Tags</div>
                                @foreach($tags as $tag)
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            @if(old('tags.' . $tag->id))
                                                <input class="form-check-input" type="checkbox" checked name="tags[{{$tag->id}}]"
                                                       value="{{$tag->id}}"> {{$tag->name}}
                                            @else
                                                <input class="form-check-input" type="checkbox" name="tags[{{$tag->id}}]"
                                                       value="{{$tag->id}}"> {{$tag->name}}
                                            @endif
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                    <div class="col-md-6">
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
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection