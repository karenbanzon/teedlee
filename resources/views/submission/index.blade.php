@extends('master')

@section('content')
<section class="row">
    <div class="small-12 large-8 large-offset-2 text-center">
        <hr>
        <h1>Submit</h1>
        <hr>
        <h4>Open Submission</h4>
        <p><a href=""><img src="images/got-an-idea.jpg"></a></p>
        <a href="{!! url('submit/form') !!}" class="button white">Submit here!</a>
        <hr>
        <div class="text-left padding-20">
            <p class="text-center"><img src="images/turn-ideas-into-cash.png"></p>
            <h4>1. Download Our Submission Templates</h4>
            <p>Sign Up and download our submission templates to get started. You can choose the style and color of the apparel you want to design on.</p>
            <p class="text-center"><a href="https://shop.teedlee.ph/pages/submission-templates" class="button white">Download submission templates</a></p>
            <h4>2. Submit Your Design</h4>
            <p>We’re excited to see your idea! Lay out your design together with a short narrative and send it to us! Learn the other info you need to know.</p>
            <p class="text-center"><a href="https://shop.teedlee.ph/pages/guidelines" class="button white">Read our guidelines</a></p>
            <h4>3. Promote Your Work &amp; Earn</h4>
            <p>If your design makes it to the online store, promote your work to friends and family. You get to earn a profit from their purchases while they get to wear some cool stuff from you.</p>
            <p class="text-center"><a href="https://shop.teedlee.ph/pages/pricing-profits-and-receiving-your-earnings" class="button white">Find out how much you can earn</a></p>
            <p class="text-center"><img src="images/mr-pencil.png"></p>
        </div>
    </div>
</section>
@endsection