<div class="alert alert-danger">
    <p>Internal voting has failed for this item and was rejected:
        {!! $submission->votes->internal->average !!} starred, {!! $flags !!} flagged.</p>
    <p>
        <a href="{!! url('admin/submission/promote/'.$submission->id.'/publication') !!}" class="btn btn-sm btn-warning">Overrride &amp; publish</a>
    </p>
</div>

@include('admin.submission.partials.edit.internal-votes-box')