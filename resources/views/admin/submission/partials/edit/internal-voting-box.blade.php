{!! Form::hidden('submission_id', $submission->id) !!}
{!! Form::hidden('type', 'internal') !!}
<div class="form-group">
    <label for="rating" class="col-sm-2 control-label">Rating</label>
    <div class="col-sm-2">
        <input type="number" min="1" max="5" class="form-control" name="rating" value="3" placeholder="Rating" required>
    </div>
</div>

<div class="form-group">
    <label for="comment" class="col-sm-2 control-label">Comment</label>
    <div class="col-md-8">
        {!! Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group">
    @foreach($submission->flag_list as $index => $list)
        <div class="col-sm-2">&nbsp;</div>
        <div class="col-sm-10">
            {!! Form::checkbox('flags[]', $index+1, null) !!}
            {!! $list !!}
        </div>
    @endforeach
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
        <button class="btn btn-primary">Submit</button>
    </div>
</div>