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