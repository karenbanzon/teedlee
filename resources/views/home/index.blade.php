@extends('master')
@section('content')
    <section class="row">
        <div class="card borderless small-12 large-4 text-center">
            <div class="card-container">
                <hr>
                <h2>Shop for tees &amp; hoodies</h2>
                <hr>
                <p>Crowdsourced. Hand picked by you.</p>
                {!! Html::image('images/home/teedlee-shop-for-tees-&-hoodies.jpg', 'Shop for tees and hoodies at Teedlee') !!}
                <br>
                <br>
                <a href="https://shop.teedlee.ph" class="button small white">Shop</a>
            </div>
        </div>
        <div class="card borderless small-12 large-4 text-center">
            <div class="card-container">
                <hr>
                <h2>Submit your design</h2>
                <hr>
                <p>Design and sell without spending</p>
                {!! Html::image('images/home/teedlee-submit-your-design.png', 'Submit your t-shirt designs at Teedlee') !!}
                <br>
                <br>
                <a href="{!! url('submit') !!}" class="button small white">Submit</a>
            </div>
        </div>
        <div class="card borderless small-12 large-4 text-center">
            <div class="card-container">
                <hr>
                <h2>Vote on designs</h2>
                <hr>
                <p>Be our guest. Help us choose!</p>
                {!! Html::image('images/home/teedlee-vote-on-designs.png', 'Vote on t-shirt designs') !!}
                <br>
                <br>
                <a href="{!! url('vote') !!}" class="button small white">Vote</a>
            </div>
        </div>
    </section>
    <section class="row">
        <hr>
        <section class="small-12 large-8 large-offset-2 text-center">
            <a href="https://shop.teedlee.ph/pages/about">{!! Html::image('images/home/teedlee-homepage-link-make-art.png', 'Earn by submitting your t-shirt designs at Teedlee.PH') !!}</a>
            <h4>Make art, make a living!</h4>
            <p>We want to make it easier for you to make a living from living out your passion.</p>
            <a href="https://shop.teedlee.ph/pages/about" class="button small neutral">Learn more &rarr;</a>
        </section>
        <hr>
        <section class="small-12 large-8 large-offset-2 text-center">
            <a href="https://shop.teedlee.ph/pages/submit">{!! Html::image('images/home/teedlee-homepage-link-download.png', 'Promote your t-shirt designs online') !!}</a>
            <p>Download our submission templates, submit your design, and promote your work to earn.</p>
            <a href="https://shop.teedlee.ph/pages/submit" class="button small neutral">Let's get started &rarr;</a>
        </section>
    </section>
@endsection

@section('scripts')
    <script>
        $(function () {
            $('.after-header').removeClass('after-header');

            var $slides = $('#slides');

            $('#slides').superslides({
                inherit_width_from: '.slides-container',
                inherit_height_from: '.slides-container',
                animation: 'fade'
            });

            Hammer($slides[0]).on("swipeleft", function (e) {
                $slides.data('superslides').animate('next');
            });

            Hammer($slides[0]).on("swiperight", function (e) {
                $slides.data('superslides').animate('prev');
            });

            $slides.superslides({
                hashchange: true
            });
        });
    </script>
@endsection