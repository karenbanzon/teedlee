@extends('email')

@section('content')
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="padding: 20px 40px;" align="center">
                <h3>Your submission was declined.</h3>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px 40px;" align="center">
                <p>{!! $declined_reason !!}</p>
            </td>
        </tr>
    </table>
@endsection