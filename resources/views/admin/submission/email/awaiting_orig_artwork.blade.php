@extends('email')

@section('content')
<tr>
    <td style="padding: 20px 40px;">
        <h1>Dear {{ $user->username }},</h1>
        <p><strong>Your design {{ $submission->title }} will be published to the store!</strong></p>
        <p>Great work! We’re excited to see your design on the store, but before that, we’ll need the original artwork from you.</p>
    </td>
</tr>
<tr>
    <td style="padding: 20px 40px;">
        <p>Our preferred file formats are:</p>
        <ul>
            <li>AI or .EPS, in CMYK color mode, fonts must be outlined (converted to vector), and links must be embedded.</li>
            <li>.PSD, in CMYK color mode, 300dpi resolution, layered by color (NOT fattened), and fonts must be rasterized.</li>            
        </ul>
        <p>Files must be editable (and high resolution if you're using a pixel-based software such as Photoshop) so minor adjustments can be applied in production.</p>
    </td>
</tr>
<tr>
    <td style="padding:40px" align="center">
        <p>{{ Html::link('user/submissions', 'SUBMIT ORIGINAL ARTWORK', ['style' => 'display: inline-block; padding: 20px; background: #f2b520; color: #ffffff; text-transform: uppercase; letter-spacing: 2px; text-decoration: none;']) }}</p>
    </td>
</tr>        
<tr>
    <td style="padding: 20px 40px;">
            <p>Your original artwork must NOT exceed 20mb.</p>
    </td>
</tr>
@endsection