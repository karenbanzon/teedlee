@extends('email')

@section('content')
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="padding: 20px 40px;" align="center">
                <p>Dear {{ $user->username }},</p>
                <p>
                    Your design {{ $entry->title }} for {{ $contest->title }} has been approved for Public Voting. 
                    In case you missed it, you can read about our submission guidelines here:
                </p>
                <p>Now is your chance to make it to the online store! Promote your design to friends, family, schoolmates, and officemates to receive more votes:</p>
                <p>{{ Html::link(url('vote/contest/'.$entry->contest_id.'/fb'), 'SHARE MY WORK') }}</p>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px 40px;" align="center">
                <p>Voting is open until {{ $contest->close_at }}. You can submit more entries until {{ $contest->end_at }}.</p>
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