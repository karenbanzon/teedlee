@extends('master')

@section('title')
    Vote for T-Shirt
@endsection

@section('content')
    <section class="row">
        <div class="small-12 large-8 large-offset-2 text-center">
            <h4>Entries from Open Submission</h4>
            <p><a href="{!! url('vote/create') !!}"><img src="images/about-teedlee.png"></a></p>
            <a href="{!! url('vote/create') !!}" class="button white small">Vote</a>
            {{--<hr>--}}
            {{--<h4>Entries for Brand X Design Challenge</h4>--}}
            {{--<p>Ends in <strong>10</strong> days.</p>--}}
            {{--<p><a href=""><img src="http://unsplash.it/600/400/?random"></a></p>--}}
            {{--<a href="" class="button white small">Vote</a>--}}
        </div>
    </section>

@endsection