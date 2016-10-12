@extends('email')

@section('content')
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="padding: 20px 40px;" align="center">
                <h3>Your artwork was declined!</h3>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px 40px;" align="center">
                <p>You will have to revise and resubmit your artwork.</p>
                <p><a href="{!! url('user/submissions') !!}" target="_blank" style="display: inline-block; padding: 20px; background: #f2b520; color: #ffffff; text-transform: uppercase; letter-spacing: 2px; text-decoration: none">Resubmit Original Artwork</a></p>
            </td>
        </tr>
    </table>
@endsection