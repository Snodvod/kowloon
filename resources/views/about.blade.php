@extends('master')

@section('content')
    @include('.partials.slider')
    <div class="row about">
        <div class="col-md-11 offset-md-1">
            <h2>About us</h2>
            <p>Bla bla about Kowloon</p>

            <div class="row contact">
                <div class="col-md-12"><h6>Leave us a message</h6>
                    <form action="/contact" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" type="email" class="form-control" id="email"
                                           placeholder="name@domain.com">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="message">Your message</label>
                                    <textarea name="message" type="email" class="form-control" id="email">Your message here</textarea>
                                </div>
                            </div>
                        </div>
                        <button class="btn" type="submit">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection
