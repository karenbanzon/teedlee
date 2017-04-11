@extends('email')

@section('content')
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="padding: 20px 40px;" align="center">
                <p>Dear {{ \Auth::user()->username }},</p>
                <p>Thank you for joining {{ $contest->title }}. The submission period has ended.</p>
                <p>
                    Voting is currently ongoing! Promote your design to friends, family, schoolmates, and officemates to receive more votes:
                </p>
                <p>{{ Html::link(url('vote/contest/'.$entry->contest_id.'/fb'), 'SHARE MY WORK',) }}</p>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px 40px;" align="center">
                <p>Voting is open until {{ $contest->close_at }}.</p>
                <p>Read more about the contest mechanics and prizes in the {{ Html::link('contest/'.$contest->id, 'contest page') }}.</p>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px 40px;" align="center">
                <p>Thanks,</p>
                <p>Teedlee Team</p>
                <p>Got questions? Email us at customer@teedlee.ph</p>
            </td>
        </tr>
    </table>
@endsection