@extends('email')

@section('content')
        <tr>
            <td style="padding: 20px 40px;">
                <h1>Dear {{ $user->username }},</h1>
                <p>The results for {{ $contest->title }} are out!</p>
            </td>
        </tr>
        <tr>
            <td style="padding:40px" align="center">
                <p>{{ Html::link('contest/'.$contest->id, 'VIEW WINNERS', ['style' => 'display: inline-block; padding: 20px; background: #f2b520; color: #ffffff; text-transform: uppercase; letter-spacing: 2px; text-decoration: none;']) }}</p>                
            </td>
        </tr>    
        <tr>
            <td style="padding: 20px 40px;" align="center">
                Thank you for joining! Till the next contest!
            </td>
        </tr>
@endsection