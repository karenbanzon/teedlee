<div class="alert alert-info">
    <p>Request has been sent to the designer to resubmit the artwork for this item.</p>
    <p><a href="{!! url('admin/submission/promote/'.$submission->id.'/orig_artwork_submitted') !!}" class="btn btn-sm btn-warning">Revert to previous artwork</a></p>
    <div class="clr"></div>
</div>

@include('admin.submission.partials.edit.internal-votes-box')