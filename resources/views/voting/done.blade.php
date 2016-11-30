@extends('master')

@section('title')
    Voting Done
@endsection

@section('content')
    <section class="row">
        <div class="small-12 large-8 large-offset-2 text-center">
            <hr>
            <h2>Thank you for voting!</h2>
            <hr>
            <p>No more designs to show for
                @if( isset($contest) )
                    <strong>{!! $contest->title !!}</strong>
                @else
                open submission.
                @endif
            </p>
            <p>Check back again for more!</p>
            <hr>
            @if( isset($contest) )
                @include('voting.open-submissions')
            @endif

            @include('voting.contest-list')
        </div>
    </section>
@endsection

@section('scripts')
    <script>
    </script>
@endsection