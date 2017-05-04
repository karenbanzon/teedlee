@extends('email')

@section('content')
<tr>
    <td style="padding: 20px 40px;">
        <h1>Dear {{ $user->username }},</h1>
        <p><strong>Your design {{ $submission->title }} earned an average score of {{ $submission->votes->average }}.</strong></p>
        <p>But the passing score is 3.5 stars. Thank you for joining.</p>
        <p>There are no limits in the number of designs you can submit, so you can always try again!</p>
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
@endsection