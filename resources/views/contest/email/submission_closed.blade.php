@extends('email')

@section('content')
        <tr>
            <td style="padding: 20px 40px;">
                <h1>Dear {{ $user->username }},</h1>
                <p>Thank you for joining {{ $contest->title }}. The submission period has ended.</p>
                <p>Voting is currently ongoing! Promote your design to friends, family, schoolmates, and officemates to receive more votes:</p>
            </td>
        </tr>    
        <tr>
            <td style="padding:40px" align="center">
                <p>{{ Html::link('vote/contest/'.$entry->contest_id.'/fb', 'SHARE MY WORK', ['style' => 'display: inline-block; padding: 20px; background: #f2b520; color: #ffffff; text-transform: uppercase; letter-spacing: 2px; text-decoration: none;']) }}</p>
            </td>
        </tr>    
        <tr>
            <td style="padding: 20px 40px;" align="center">
                <p>Voting is open until {{ $contest->close_at }}.</p>
                <p>Read more about the contest mechanics and prizes in the {{ Html::link('contest/'.$contest->id, 'contest page') }}.</p>
            </td>
        </tr>
@endsection