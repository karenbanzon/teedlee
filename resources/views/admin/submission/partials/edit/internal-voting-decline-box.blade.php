<div class="box box-primary">
    <div class="box-header with-border text-bold">
        Notify the designer
    </div>

    <div class="box-body">
        {!! Form::open(['url' => url('admin/submission/promote/'.$submission->id.'/internal_voting_fail')]) !!}
        {!! Form::hidden('submission_id', $submission->id) !!}
        <div class="form-group">
            <div class="col-md-12">
                {!! Form::textarea('declined_reason', null, ['class' => 'form-control block', 'rows' => '5', 'required' => 'required', 'placeholder' => 'Reason for declining']) !!}
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