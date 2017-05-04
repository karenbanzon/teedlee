<div class="alert alert-success">
    <p>
        @if($submission->flags()->count() || $submission->votes->internal->average < 1.9)
            Internal voting has failed but was overriden by an admin
        @else
            Internal voting has ended for this item was successful
        @endif
        ({!! $submission->votes->internal->average . ' ' . str_plural('star', $submission->votes->internal->average) !!}) <br/>
    </p>
    <p><a href="{!! url('admin/submission/promote/'.$submission->id.'/awaiting_orig_artwork') !!}" class="btn btn-sm btn-warning">Resend request for original artwork</a></p>
    <div class="clr"></div>
</div>

@include('admin.submission.partials.edit.internal-votes-box')