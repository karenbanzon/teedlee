@extends('email')

@section('content')
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="padding: 20px 40px;" align="center">
                <h3>Hi, {!! $username !!}!</h3>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px 40px;" align="center">
                <p>Welcome to Teedlee!</p>
                <p>You&rsquo;ll need to confirm your email address to finish creating your account.</p>
                <a href="{!! $link !!}" target="_blank" style="display: inline-block; padding: 20px; background: #f2b520; color: #ffffff; text-transform: uppercase; letter-spacing: 2px; text-decoration: none">Confirm my email</a>
            </td>
        </tr>
    </table>
@endsection