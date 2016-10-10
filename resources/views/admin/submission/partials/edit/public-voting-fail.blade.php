<div class="alert alert-danger">
    <p>Public voting has failed for this item and was rejected:
        {!! $submission->votes->public->average !!} starred, {!! $flags !!} flagged.</p>
    <p>
        <a href="{!! url('admin/submission/promote/'.$submission->id.'/publication') !!}" class="btn btn-sm btn-warning">Overrride &amp; publish</a>
    </p>
</div>