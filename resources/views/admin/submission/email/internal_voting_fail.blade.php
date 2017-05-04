@extends('email')

@section('content')
@if($submission->flags()->count())
<tr>
    <td style="padding: 20px 40px;">
        <h1>Dear {{ $user->username }},</h1>
        <p><strong>Your design {{ $submission->title }} has been disqualified.</strong></p>
        <p>Upon careful assessment, the team has decided to decline your work due to one or more of the reasons stated below:</p>
        <ul>
            <li>copyright or trademark infringement</li>
            <li>extreme profanity</li>
            <li>pornography</li>
            <li>racism</li>
            <li>religious, political, and gender affront</li>
            <li>other characteristics deemed inappropriate to publish</li>
        </ul>
        <p>Please try again. </p>
    </td>
</tr>

@else

<tr>
    <td style="padding: 20px 40px;">
        <h1>Dear {{ $user->username }},</h1>
        <p><strong>Your design {{ $submission->title }} did not make it to the Public Voting.</strong></p>
        <p>But there are no limits in the number of designs you can submit, so you can always try again!</p>
    </td>
</tr>
<tr>
    <td style="padding:40px" align="center">
        <p>{{ Html::link('submit', 'SUBMIT', ['style' => 'display: inline-block; padding: 20px; background: #f2b520; color: #ffffff; text-transform: uppercase; letter-spacing: 2px; text-decoration: none;']) }}</p>
    </td>
</tr>        
<tr>
    <td style="padding: 20px 40px;">
        <p>We're looking forward to your next design!</p>
    </td>
</tr>
@endif
@endsection