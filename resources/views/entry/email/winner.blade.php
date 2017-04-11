@extends('email')

@section('content')
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="padding: 20px 40px;" align="center">
                <p>Dear {{ $user->username }},</p>
                <p>Congratulations! Your design {{ $entry->title }} has won the {{ $contest->title }}!</p>
                <p>Great work! We're excited to see your design on the store, but before that, we’ll need the original artwork from you.</p>
                <p>Our preferred file formats are:</p>
                <ul>
                    <li>AI or .EPS, in CMYK color mode, fonts must be outlined (converted to vector), and links must be embedded.</li>
                    <li>.PSD, in CMYK color mode, 300dpi resolution, layered by color (NOT fattened), and fonts must be rasterized.</li>
                </ul>
                <p>Files must be editable (and high resolution if you're using a pixel-based software such as Photoshop) so minor adjustments can be applied in production.</p>
                <p>{{ Html::link('mailto:admin@teedlee.ph', 'SUBMIT ORIGINAL ARTWORK') }}</p>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px 40px;" align="center">
                <p>Your original artwork must NOT exceed 20MB.</p>
                <p>Your Contest Prize: __________</p>
                <p>To collect your contest prize: _____________</p>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px 40px;" align="center">
                <p>Thanks,</p>
                <p>Teedlee Team</p>
                <p>Got questions? Email us at customer@teedlee.ph</p>
            </td>
        </tr>
    </table>
@endsection