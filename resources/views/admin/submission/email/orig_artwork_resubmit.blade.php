@extends('email')

@section('content')
<tr>
    <td style="padding: 20px 40px;">
        <h1>Dear {{ $user->username }},</h1>
        <p><strong>Your original artwork for {{ $submission->title }} was declined for the following reason:</strong></p>
    </td>
</tr>
<tr>
    <td style="padding: 20px 40px;">
        <blockquote style="color:gray;">{{ $submission->declined_reason }}</blockquote>
    </td>
</tr>
<tr>
    <td style="padding: 20px 40px;">
        <p>You will have to revise and resubmit your artwork.</p>
    </td>
</tr>
<tr>
    <td style="padding:40px" align="center">
        <p>{{ Html::link('user/submissions', 'RESUBMIT ORIGINAL ARTWORK', ['style' => 'display: inline-block; padding: 20px; background: #f2b520; color: #ffffff; text-transform: uppercase; letter-spacing: 2px; text-decoration: none;']) }}</p>
    </td>
</tr>
@endsection