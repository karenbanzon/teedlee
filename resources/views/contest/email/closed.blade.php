@extends('email')

@section('content')
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="padding: 20px 40px;" align="center">
                <p>Dear {{ \Auth::user()->username }},</p>
                <p>The results for {{ $contest->title }} are out!</p>
                <p>{{ Html::link('contest/'.$contest->id, 'VIEW WINNERS') }}</p>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px 40px;" align="center">
                Thank you for joining! Till the next contest!
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