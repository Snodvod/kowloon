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
            <form action="/admin/faqs" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input value="{{old('question')}}" type="text" class="form-control" id="question"
                                   name="question">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <textarea rows="6" class="form-control" id="answer"
                                      name="answer">{{old('answer')}}</textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>

@endsection