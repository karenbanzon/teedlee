<div class="alert alert-info">
    <p class="h4">
        Designer has submitted their original artwork for this item.
    </p>
    <div>&nbsp;</div>
    <p>
        <a href="{!! url('admin/submission/promote/'.$submission->id.'/publication') !!}"
           class="btn btn-sm btn-primary"><i class="fa fa-check"></i> Approve</a>

        <a href="{!! url('users/'.$submission->user_id.'/'.$submission->id.'.orig.psd') !!}"
           class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download artwork</a>

        <a href="{!! url('admin/submission/promote/'.$submission->id.'/orig_artwork_resubmit') !!}"
           class="btn btn-sm btn-warning"><i class="fa fa-refresh"></i> Request for resubmission</a>

        <a href="#" class="btn btn-sm btn-sm btn-danger pull-right" id="decline"><i class="fa fa-close"></i> Decline</a>
    </p>
    <div class="clr"></div>
</div>

@include('admin.submission.partials.edit.orig-artwork-decline-box')

<script>
    $(function(){
        $('#decline').click(function(e){
            e.preventDefault();
            $('decline-reason').show();
        });
    });
</script>