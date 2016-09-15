@extends('master')

@section('content')
    <section class="row">
        <div class="small-12 large-8 large-offset-2">
            <hr>
            <h4 class="text-center">VOTE</h4>
            <hr>
        </div>
        <div class="small-12 columns" id="voting">
            <div class="card small-12 large-8 large-offset-2">
                <div class="card-container">
                    <div id="ag-images"></div>
                    <div class="card-body item">
                        <div class="item-name text-center"><h6 id="ag-title">Bacon &amp; Eggs</h6></div>
                        <div class="text-center">By <a href=""><strong id="ag-author">chaks</strong></a></div>
                        <br>
                        <div class="vote-actions text-center">
                            <a href="" class="star star-1" data-value="1"><span class="icon icon-star"></span></a>
                            <a href="" class="star star-2" data-value="2"><span class="icon icon-star"></span></a>
                            <a href="" class="star star-3" data-value="3"><span class="icon icon-star"></span></a>
                            <a href="" class="star star-4" data-value="4"><span class="icon icon-star"></span></a>
                            <a href="" class="star star-5" data-value="5"><span class="icon icon-star"></span></a>
                        </div>
                        <div class="vote-comments">
                            {!! Form::open(['url' => '#']) !!}
                                <div class="form-field block">
                                    <label>Comments</label>
                                    <textarea rows="2" placeholder="What do you think of this design?" name="comment"></textarea>
                                    <input type="hidden" name="submission_id" />
                                    <input type="hidden" name="rating" />
                                </div>
                            {!! Form::close() !!}
                            <div class="text-center">
                                <a href="">View comments</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card small-12 large-8 large-offset-2 text-center">
                <a href="" class="button" id="ag-vote">Vote</a>
                <a href="" class="button white" id="ag-skip">Next</a>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    {!! Html::script('bower_components/slick-carousel/slick/slick.min.js') !!}
    {!! Html::style('bower_components/slick-carousel/slick/slick.css') !!}
    {!! Html::style('bower_components/slick-carousel/slick/slick-theme.css') !!}
    {!! Html::script('bower_components/AsterGates/agrating/agrating.js') !!}
    {!! Html::script('bower_components/jquery-touchswipe/jquery.touchSwipe.min.js') !!}
    <script>
        $(function() {
            $('#voting').agrating({
                data : {!! $submissions !!}
            });
        });
    </script>
@endsection