<div class="alert alert-danger">
    <p>Internal voting has failed for this item and was rejected:
        {!! $submission->votes->internal->average !!} starred, {!! $flags !!} flagged.</p>
    <div class="clr"></div>
</div>

@include('admin.submission.partials.edit.internal-votes-box')