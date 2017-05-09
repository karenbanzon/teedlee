<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="robots" content="noindex,nofollow" />
    <style>
        html, body {
            display: flex;
            font-family: calibri, tahoma, arial;
            height: 100%;
            margin: 0;
            width: 100%;
        }

        .wrapper {
            height: 100%;
            position: relative;
            text-align: center;
        }

        .content {
            bottom: 0;
            color: #fff;
            position: absolute;
            width: 80%;
            padding: 0.5rem;
            font-size: 0.8rem;
            background-color: #ff931f;
            border-radius: 1rem;
            margin: 0 auto 0.5rem auto;
            left: 0;
            right: 0;
            opacity: .8;
        }

        .content h1 {
            font-size: 1rem;
            margin: 0;
        }

        .btn {
            border: 1px solid #fff;
            padding: .5rem;
            display: inline-block;
            margin: .5rem 0 0;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            text-transform: uppercase;
        }

        .btn:hover {
            background-color: #fff;
            color: #333;
        }
    </style>
</head>
<body>
<div style="width:100%; height:auto; background-image:url({{url('contests/'.$contest->id.'/'.$contest->banner)}}); background-size: cover; background-position: center;">
    <div class="wrapper">
        <div class="content">
            <h1>{{ $contest->title }}</h1>
            <div>{!! strip_tags($contest->description) !!}</div>
            @if( $contest->status() == 'Not yet started' )
                <div>Submissions opening soon</div>
                <a href="{{ url('contest/'.$contest->id) }}" class="btn" target="_blank">Learn more</a>

            @elseif( $contest->isSubmitting() && $contest->isVoting() )
                <div>Voting ongoing. Submissions still open.</div>
                <a href="{{ url('contest/'.$contest->id) }}" class="btn" target="_blank">Learn more</a>
                <a href="{{ url('entries/submit/'.$contest->id) }}" class="btn" target="_blank">Submit</a>

            @elseif( !$contest->isSubmitting() && $contest->isVoting() )
                <div>Submissions closed. Voting ongoing, will close on {{ $contest->close_at }}.</div>
                <a href="{{ url('contest/'.$contest->id) }}" class="btn" target="_blank">Learn more</a>
                <a href="{{ url('vote/contest/'.$contest->id) }}" class="btn" target="_blank">Vote</a>

            @elseif( $contest->isSubmitting() && !$contest->isVoting() )
                <div>Submissions open. Voting will begin on {{ $contest->end_at }}.</div>
                <a href="{{ url('contest/'.$contest->id) }}" class="btn" target="_blank">Learn more</a>
                <a href="{{ url('entries/submit/'.$contest->id) }}" class="btn" target="_blank">Submit</a>

            @elseif( $contest->status == 'awaiting_winners' )
                <div>
                    Submissions and voting closed. Awaiting announcement of winners.
                </div>
                <a href="{{ url('contest/'.$contest->id) }}" class="btn" target="_blank">Learn more</a>

            @elseif( $contest->status == 'closed' )
                <div>
                    Contest closed. Congratulations
                    @foreach( $contest->winners as $index => $entry )
                        {!! Html::link($entry->user->username, $entry->user->username, ['class' => 'text-bold']) .
                        ( count($contest->winners) > 1 && $index==count($contest->winners)-2 ? ' and ' : ($index < count($contest->winners)-1 ? ', ' : null) ) !!}
                    @endforeach
                    !
                </div>
                <a href="{{ url('contest/'.$contest->id) }}" class="btn" target="_blank">View winners</a>
            @endif
        </div>
    </div>
</div>
</body>
</html>