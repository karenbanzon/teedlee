@extends('email')

@section('content')
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="padding: 20px 40px;" align="center">
                <p>Dear {{ $user->username }},</p>
                <p>Thank you for joining {{ $contest->title }}. The voting period as ended.</p>
                <p>
                    The contest results will be published soon. Visit the {{ Html::link('contest/'.$contest->id, 'contest page') }} for the winners.
                </p>
                <p>{{ Html::link('submit', 'SEE ONGOING CONTESTS') }}</p>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px 40px;" align="center">
                <p>Stay tuned for updates and keep those ideas coming!</p>
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