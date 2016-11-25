@foreach($entries as $entry)
    <div class="card small-12">
        <h6>Contest Entries</h6>
        <table style="width: 100%;">
            <thead>
            <tr>
                <th>Design</th>
                <th class="text-left">Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td width="25%">
                        {!! Html::image($entry->images[0]->path, null, []) !!}
                    </td>
                    <td class="text-left">
                        <span class="small text-warning">{!! $entry->contest->title !!}</span><br>
                        {!! $entry->title !!}
                    </td>
                    {{--<td>{!! date('d M Y', strtotime($entry->created_at)) !!}</td>--}}
                    <td>
                        {!! $entry->getShopStatusAttribute() !!}
                    </td>
                    <td>
                        @if( $entry->status == 'public_voting' )
                            <a href="{!! url('vote/contest/'.$entry->contest_id.'/fb',['entry'=>$entry->id]) !!}" class="fb-share button tiny white" target="_blank">Share</a>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>

        <div>&nbsp;</div>
    </div>
@endforeach