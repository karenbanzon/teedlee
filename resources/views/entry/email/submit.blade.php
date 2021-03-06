@extends('email')

@section('content')
        <tr>
            <td style="padding: 20px 40px;">
                <h1>Dear {{ $user->username }},</h1>
                <p>Thank you for submitting your design for {{ $contest->title }}!</p>
                <p>
                    Your design {{ $entry->title }} will be reviewed for approval. 
                    In case you missed it, you can read about our submission guidelines here:
                </p>
            </td>
        </tr>
        <tr>
            <td style="padding:40px" align="center">
                <p>{{ Html::link('contest/'.$contest->id, 'CONTEST GUIDELINES', ['style' => 'display: inline-block; padding: 20px; background: #f2b520; color: #ffffff; text-transform: uppercase; letter-spacing: 2px; text-decoration: none;']) }}</p>                
            </td>
        </tr>        
        <tr>
            <td style="padding: 20px 40px;">
                Stay tuned for updates and keep those ideas coming! 
            </td>
        </tr>
@endsection