<div class="alert alert-info">
    <p>
        Public voting successful.
        {!! $submission->votes->public->average !!} starred.
    </p>

    <p>
        <a href="{!! url('admin/submission/promote/'.$submission->id.'/awaiting_orig_artwork') !!}" class="btn btn-sm btn-primary">Request Original Artwork</a>
    </p>

    <div class="clr"></div>
</div>