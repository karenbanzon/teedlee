@extends('master');

@section('content')
    <section class="row">
        <div class="small-12 large-8 large-offset-2">
            <hr>
            <h4 class="text-center">{!! $user->username !!}</h4>
            <hr>
        </div>
        <div class="small-12 large-8 large-offset-2">
            <div class="small-4 columns small-offset-2">
                <img src="{!! $user->avatar !!}">
            </div>
            <div class="small-6 columns">
                <p><strong>Joined</strong>: {!! $user->created_at !!}</p>
                <p><strong>Average score</strong>: 0.0 <span class="icon icon-star"></span></p>
            </div>
        </div>
        <div class="small-12 columns">
            <hr>
            <h6 class="text-center">Works</h6>
            <hr>
            @foreach($submissions as $submission)
            <div class="card small-12 medium-6 large-4">
                <div class="card-container">
                    <div class="cover" style="background-image: url({!! $submission->images[0]->path !!}); height: 400px;">
                    </div>
                    <div class="card-body item">
                        <div class="item-name text-center"><h6>{!! $submission->title !!}</h6></div>
                        <div class="item-actions text-center">
                            <a href="" class="button tiny white">View in store</a>
                            <a href="" class="button tiny white">Share</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </section>
@endsection