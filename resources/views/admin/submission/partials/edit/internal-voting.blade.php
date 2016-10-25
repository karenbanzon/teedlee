<div class="alert alert-info">
    <p>Internal voting ends on <strong>{!! $submission->internal_voting_end !!}</strong></p>
    <a href="{!! url('admin/submission/expire/'.$submission->id) !!}" class="btn btn-sm btn-primary">End voting</a>
    <div class="clr"></div>
</div>

@include('admin.submission.partials.edit.internal-votes-box')