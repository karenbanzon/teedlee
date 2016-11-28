@extends('admin/master')
@section('head')
    {!! Html::style('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-4">
                @include('admin.entries.partials.edit.summary')
            </div>

            <div class="col-md-8">
                @include('admin.entries.partials.edit.votes-box', ['type' => 'internal', 'entries' => $entry->votes()->where('type', 'internal')->get()])
            </div>

            <div class="col-md-8">
                @include('admin.entries.partials.edit.votes-box', ['type' => 'external', 'entries' => $entry->votes()->where('type', 'external')->get()])
            </div>

            <div class="col-md-8">
                @include('admin.entries.partials.edit.entry-decline-box')
            </div>
        </div>

        <div class="clr"></div>
    </section>
@endsection

@section('scripts')
    <script>
        $(function () {
        });
    </script>
@endsection