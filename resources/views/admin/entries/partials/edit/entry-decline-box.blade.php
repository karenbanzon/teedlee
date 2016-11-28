<div class="box box-primary">
    <div class="box-header with-border text-bold">
        Decline Entry
    </div>

    <div class="box-body">
        {!! Form::open(['url' => url('admin/entries/'.$entry->id)]) !!}
        {{ method_field('PUT') }}
        {!! Form::hidden('entry_id', $entry->id) !!}
        @if( $entry->status == 'internal_voting_fail' )
            {!! Form::hidden('status', 'submitted') !!}
            {!! Form::hidden('declined_reason', '') !!}
            <p>Entry has been declined due to the following reasons:</p>
            <blockquote>{!! $entry->declined_reason !!}</blockquote>
            <button class="btn btn-warning">Override decline</button>
        @else
        {!! Form::hidden('status', 'internal_voting_fail') !!}
        <div class="form-group">
            <div class="col-md-12">
                {!! Form::textarea('declined_reason', null, ['class' => 'form-control block', 'rows' => '5', 'cols' => '', 'required' => 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
                <button class="btn btn-primary">Decline Entry</button>
            </div>
        </div>
        @endif
        {!! Form::close() !!}
        <div>&nbsp;</div>
    </div>
</div>