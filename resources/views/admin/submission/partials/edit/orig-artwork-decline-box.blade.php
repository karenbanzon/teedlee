<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Reason for declining</h3>
    </div>

    <div class="box-body">
        {!! Form::open(['url' => url('admin/submission/promote/'.$submission->id.'/orig_artwork_declined')]) !!}
        {!! Form::hidden('submission_id', $submission->id) !!}
        <div class="form-group">
            <div class="col-md-12">
                {!! Form::textarea('declined_reason', null, ['class' => 'form-control block', 'rows' => '5', 'cols' => '', 'required' => 'required']) !!}
            </div>
        </div>

        <div>&nbsp;</div>

        <div class="form-group">
            <div class="col-sm-12">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>