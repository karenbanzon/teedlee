@foreach($entries as $entry)
    <div class="card small-12">
        <h3>Contest Entries</h3>
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
                    <td></td>
                </tr>
            </tbody>
        </table>

        <div>&nbsp;</div>
    </div>
@endforeach