@extends('email')

@section('content')
        <tr>
            <td style="padding: 20px 40px;">
                <h1>Dear {{ $user->username }},</h1>
                <p>Thank you for joining {{ $contest->title }}. The voting period as ended.</p>
                <p>
                    The contest results will be published soon. Visit the {{ Html::link('contest/'.$contest->id, 'contest page') }} for the winners.
                </p>
            </td>
        </tr>
        <tr>
            <td style="padding:40px" align="center">
                <p>{{ Html::link('submit', 'SEE ONGOING CONTESTS', ['style' => 'display: inline-block; padding: 20px; background: #f2b520; color: #ffffff; text-transform: uppercase; letter-spacing: 2px; text-decoration: none;']) }}</p>                
            </td>
        </tr>    
        <tr>
            <td style="padding: 20px 40px;">
                <p>Stay tuned for updates and keep those ideas coming!</p>
            </td>
        </tr>
@endsection