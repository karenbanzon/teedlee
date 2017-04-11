@extends('email')

@section('content')
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="padding: 20px 40px;" align="center">
                <p>Dear {{ \Auth::user()->username }},</p>
                <p>Thank you for submitting your design for {{ $contest->title }}!</p>
                <p>
                    Your design {{ $entry->title }} will be reviewed for approval. 
                    In case you missed it, you can read about our submission guidelines here:
                </p>
                <p>{{ Html::link('contest/'.$contest->id, 'CONTEST GUIDELINES') }}</p>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px 40px;" align="center">
                Stay tuned for updates and keep those ideas coming! 
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