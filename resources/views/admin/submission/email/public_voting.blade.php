@extends('email')

@section('content')
<tr>
    <td style="padding: 20px 40px;">
        <h1>Dear {{ $user->username }},</h1>
        <p>
            <strong>Your design {{ $submission->title }} has been approved for Public Voting!</strong> 
        </p>
        <p>Now is your chance to make it to the online store! Promote your design to friends, family, schoolmates, and officemates to receive more votes:</p>
    </td>
</tr>
<tr>
    <td style="padding:40px" align="center">
        <p>{{ Html::link('vote/'.$submission->id.'/fb', 'SHARE MY WORK', ['style' => 'display: inline-block; padding: 20px; background: #f2b520; color: #ffffff; text-transform: uppercase; letter-spacing: 2px; text-decoration: none;']) }}</p>
    </td>
</tr>        
<tr>
    <td style="padding: 20px 40px;">
        <p>
            Your Internal Score will be combined with your Public Score to determine if your design will be sold on the store. 
            Read more about the contest mechanics and prizes in the {{ Html::link('submission/guidelines', 'guidelines page') }}.
        </p>
    </td>
</tr>
@endsection