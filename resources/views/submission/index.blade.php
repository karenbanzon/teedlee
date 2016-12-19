@extends('master')

@section('title')
    Submit Your T-Shirt Designs
@endsection

@section('content')
<section class="row">
    <div class="small-12 large-8 large-offset-2 text-center">
        <hr>
        <h1>Submit</h1>
        <hr>
        <h4>Open Submission</h4>
        <p><a href="{!! url('submit/form') !!}"><img src="images/got-an-idea.jpg"></a></p>
        <a href="{!! url('submit/form') !!}" class="button white">Submit here!</a>
        <hr>

        @foreach( $contests as $contest )
        <?php $start = $carbon->parse($contest->start_at) ?>
        <h4>{!! $contest->title !!}</h4>

        @if( $contest->status == 'submission_closed' )
            <p>Submission opens in <strong>{!! $carbon->now()->diffForHumans($start, true) !!}</strong>.</p>

        @elseif( in_array($contest->status, ['submission_open', 'voting_open']) )
            <p>Ends in <strong>{!! $carbon->diffForHumans($carbon->parse($contest->end_at), $carbon->now()) !!}</strong>.</p>

        @elseif( $contest->status == 'awaiting_winners' )
            <p>Voting has ended. Winners will be announced shortly.</p>

        @elseif( $contest->status == 'closed' )
            <p>
                Contest is closed. Congratulations
                @foreach( $contest->winners as $index => $entry )
                    {!! Html::link($entry->user->username, $entry->user->username, ['class' => 'text-bold']) .
                    ( count($contest->winners) > 1 && $index==count($contest->winners)-2 ? ' and ' : ($index < count($contest->winners)-1 ? ', ' : null) ) !!}
                @endforeach
                !
            </p>
        @else
            {!! dd($contest->status) !!}
        @endif

        @if( $contest->status == 'submission_open' || ( $contest->status == 'voting_open' && $carbon->parse($contest->end_at) > $carbon->now()) )
            <p>
                <a href="{!! url('entries/submit/'.$contest->id) !!}">{!! Html::image('contests/'.$contest->id.'/'.$contest->banner) !!}</a>
            </p>
            <a href="{!! url('entries/submit/'.$contest->id) !!}" class="button white">Submit</a>
            <a href="{!! url('contest/'.$contest->id) !!}" class="button white">Learn more</a>
        @else
            <p>{!! Html::image('contests/'.$contest->id.'/'.$contest->banner) !!}</p>
            <a href="{!! url('contest/'.$contest->id) !!}" class="button white">Learn more</a>
        @endif
        <hr>
        @endforeach

        <div class="text-left padding-20">
            <p class="text-center"><img src="images/turn-ideas-into-cash.png"></p>
            <h4>1. Download Our Submission Templates</h4>
            <p>Sign Up and download our submission templates to get started. You can choose the style and color of the apparel you want to design on.</p>
            <p class="text-center"><a href="https://shop.teedlee.ph/pages/submission-templates" class="button white">Download submission templates</a></p>
            <p>&nbsp;</p>

            <h4>2. Submit Your Design</h4>
            <p>We’re excited to see your idea! Lay out your design together with a short narrative and send it to us! Learn the other info you need to know.</p>
            <p class="text-center"><a href="https://shop.teedlee.ph/pages/guidelines" class="button white">Read our guidelines</a></p>
            <p>&nbsp;</p>

            <h4>3. Promote Your Work &amp; Earn</h4>
            <p>If your design makes it to the online store, promote your work to friends and family. You get to earn a profit from their purchases while they get to wear some cool stuff from you.</p>
            <p class="text-center"><a href="https://shop.teedlee.ph/pages/pricing-profits-and-receiving-your-earnings" class="button white">Find out how much you can earn</a></p>
            <p class="text-center"><img src="images/mr-pencil.png"></p>
        </div>
    </div>
</section>
@endsection