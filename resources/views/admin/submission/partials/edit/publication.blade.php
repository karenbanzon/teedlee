<div class="alert bg-gray">
    <p>
        This item has been published and is now in production mode.
        Don't forget to set the correct Shopify link for this item on the field below.
    </p>
</div>

<div class="alert alert-info">
    {!! Form::open(['url'=>'admin/submission/'.$submission->id.'/shopify-link']) !!}
    {!! Form::label('shopify_link', 'Shopify link') !!}
    <div class="input-group">
        <span class="input-group-btn">
            <a href="{!! $submission->shopify_link !!}" class="btn btn-default text-black"
               target="_blank" title="View in shop"><span class="fa fa-eye"></span></a>
        </span>
        {!! Form::url('shopify_link', $submission->shopify_link, ['class' => 'form-control']) !!}
        <span class="input-group-btn">
            <button type="submit" class="btn btn-warning btn-flat">Update</button>
        </span>
    </div>
    {!! Form::close() !!}
</div>
