@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' '.$dataType->getTranslatedAttribute('display_name_plural'))

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="{{ $dataType->icon }}"></i> {{ $dataType->getTranslatedAttribute('display_name_plural') }}
        </h1>
        @can('add', app($dataType->model_name))
            <a href="{{ route('voyager.'.$dataType->slug.'.create') }}" class="btn btn-success btn-add-new">
                <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>
            </a>
        @endcan
        @can('edit', app($dataType->model_name))
            @if(isset($dataType->order_column) && isset($dataType->order_display_column))
                <a href="{{ route('voyager.'.$dataType->slug.'.order') }}" class="btn btn-primary btn-add-new">
                    <i class="voyager-list"></i> <span>{{ __('voyager::bread.order') }}</span>
                </a>
            @endif
        @endcan
        @can('delete', app($dataType->model_name))
            @if($usesSoftDeletes)
                <input type="checkbox" @if ($showSoftDeleted) checked @endif id="show_soft_deletes" data-toggle="toggle" data-on="{{ __('voyager::bread.soft_deletes_off') }}" data-off="{{ __('voyager::bread.soft_deletes_on') }}">
            @endif
        @endcan
        @foreach($actions as $action)
            @if (method_exists($action, 'massAction'))
                @include('voyager::bread.partials.actions', ['action' => $action, 'data' => null])
            @endif
        @endforeach
        @include('voyager::multilingual.language-selector')
    </div>
@stop

@section('content')
    <div class="container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="student-criteria" class="table table-hover dataTable no-footer">
                                        <thead>
                                        <tr>
                                            <th>
                                                Periode
                                            </th>
                                            <th>
                                                Student Name
                                            </th>
                                            <th>
                                                Profit
                                            </th>
                                            <th>
                                                Detail Profit
                                            </th>
                                            <th>
                                                Total Score
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script>
        $(document).ready(function(){
            $('#student-criteria').DataTable({
                serverSide:true,
                responsive:true,
                processing:true,
                ajax: "{{ route('getProfitStudent') }}",
                columns:[
                    {data:'periode'},
                    {data:'student'},
                    {data:'profit'},
                    {data:'detail_profit'},
                    {data:'score'},
                    {data:'status'},
                    {data:'action'}
                ]
            });
        });

        $('body').on('click', '#btn-delete', function(e){
            e.preventDefault();
            let url = $(this).data('url');

            var con = confirm('Do you want to delete this data ?');

            if(con){
                $.ajax({
                    url:url,
                    type:'POST',
                    data:{
                        '_method':'DELETE'
                    },
                    success: function(res){
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endpush
