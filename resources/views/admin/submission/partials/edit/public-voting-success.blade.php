<div class="alert alert-info">
    <p>
        Public voting successful.
        {!! $submission->votes->public->average !!} starred.
    </p>

    <p>
        <a href="{!! url('admin/submission/promote/'.$submission->id.'/publication') !!}" class="btn btn-sm btn-primary">Approve for publication</a>
    </p>

    <div class="clr"></div>
</div>