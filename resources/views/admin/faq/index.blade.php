@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>FAQ</h2>
            <a href="/admin/faqs/create" class="btn create btn-primary">Create new</a>
            <table class="cell-border stripe hover order-column faq" id="js-faq-table">
                <thead>
                <tr>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($faqs as $faq)
                    <tr>
                        <td>{{$faq->question}}</td>
                        <td>{{$faq->answer}}</td>
                        <td class="text-xs-center"><a class="edit" href="/admin/faqs/{{$faq->id}}/edit"><i
                                        class="fa fa-pencil-square-o"></i></a></td>
                        <td class="text-xs-center"><i class="js-delete-faq fa fa-trash-o" data-id="{{$faq->id}}"></i>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection