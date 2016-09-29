<div class="alert alert-danger">
    <p class="h4">
        The original artwork for this submission has been declined with the following message:
    </p>

    <div>&nbsp;</div>

    <blockquote>
        {!! $submission->declined_reason !!}
    </blockquote>

    <p><a href="{!! url('admin/submission/promote/'.$submission->id.'/orig_artwork_submitted') !!}" class="btn btn-sm btn-warning">Undo decline</a></p>
    <div class="clr"></div>
</div>