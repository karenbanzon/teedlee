@extends('email')

@section('content')
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="padding: 20px 40px;" align="center">
                <h3>Password Recovery</h3>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px 40px;" align="center">
                <p>You have requested to recover your password. Click the below below to change your password.</p>
                <p><a href="{!! $link !!}" target="_blank" style="display: inline-block; padding: 20px; background: #f2b520; color: #ffffff; text-transform: uppercase; letter-spacing: 2px; text-decoration: none">Recover Password</a></p>
            </td>
        </tr>
    </table>
@endsection