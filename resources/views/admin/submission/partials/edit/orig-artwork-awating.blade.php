<div class="alert alert-success">
    <p>
        Internal voting has ended for this item was successful
        ({!! $submission->votes->internal->average !!} stars). <br/>
    </p>
    <p><a href="{!! url('admin/submission/promote/'.$submission->id.'/awaiting_orig_artwork') !!}" class="btn btn-sm btn-warning">Request for original artwork</a></p>
    <div class="clr"></div>
</div>