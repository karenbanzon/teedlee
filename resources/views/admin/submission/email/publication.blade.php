@extends('email')

@section('content')
<tr>
    <td style="padding: 20px 40px;">
        <h1>Dear {{ $user->username }},</h1>
        <p><strong>Your design {{ $submission->title }} is now available for purchase!</strong></p>
        <p>Time to earn from your design!</p>
    </td>
</tr>
<tr>
    <td style="padding:40px" align="center">
        <p>{{ Html::link('https://shop.teedlee.ph/collection/'.$user->username, 'VIEW IN SHOP', ['style' => 'display: inline-block; padding: 20px; background: #f2b520; color: #ffffff; text-transform: uppercase; letter-spacing: 2px; text-decoration: none;']) }}</p>
    </td>
</tr>        
<tr>
    <td style="padding: 20px 40px;">
        <p>
            Every purchase of your design rewards you with earnings. 
            Learn more about {{ Html::link('pricing-and-earnings', 'Pricing and Earnings') }}.
        </p>
    </td>
</tr>
@endsection