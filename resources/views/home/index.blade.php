@extends('master')
@section('content')
    <section class="row">
        <div class="card borderless small-12 large-4 text-center">
            <div class="card-container">
                <hr>
                <h2>Shop for tees &amp; hoodies</h2>
                <hr>
                <p>Crowdsourced. Hand picked by you.</p>
                <img src="http://unsplash.it/400/600?random" alt="">
                <br>
                <br>
                <a href="{!! env('SHOP_URL') !!}" class="button small white">Shop</a>
            </div>
        </div>
        <div class="card borderless small-12 large-4 text-center">
            <div class="card-container">
                <hr>
                <h2>Submit your design</h2>
                <hr>
                <p>Design and sell without spending</p>
                <img src="http://unsplash.it/400/600/?random" alt="">
                <br>
                <br>
                <a href="{!! url('submit') !!}" class="button small white">Submit</a>
            </div>
        </div>
        <div class="card borderless small-12 large-4 text-center">
            <div class="card-container">
                <hr>
                <h2>Vote for designs</h2>
                <hr>
                <p>Be our guest. Help us choose!</p>
                <img src="http://unsplash.it/400/600/?random" alt="">
                <br>
                <br>
                <a href="{!! url('vote') !!}" class="button small white">Vote</a>
            </div>
        </div>
    </section>
    <section class="row">
        <hr>
        <section class="small-12 large-8 large-offset-2 text-center">
            <img src="http://unsplash.it/600/400/?random" alt="">
            <h4>Make art, make a living!</h4>
            <p>We want to make it easier for you to make a living from living out your passion.</p>
            <a href="" class="button small neutral">Learn more</a>
        </section>
        <hr>
        <section class="small-12 large-8 large-offset-2 text-center">
            <img src="http://unsplash.it/600/400/?random" alt="">
            <p>Download our submission templates, submit your design, and promote your work to earn.</p>
            <a href="" class="button small neutral">Let's get started &rarr;</a>
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