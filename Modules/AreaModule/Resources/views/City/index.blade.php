@extends('commonmodule::layouts.master')

@section('title')
    {{__('areamodule::city.citytitle')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content-header')
    <section class="content-header">
        <h1> {{__('areamodule::city.citytitle')}} </h1>

    </section>
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('areamodule::city.citytitle')}}</h3>
                        {{-- Add New --}}
                        <a href="{{url('admin-panel/city/create')}}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp; {{__('areamodule::city.addnew')}}</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="CountryIndex" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>{{__('areamodule::city.id')}}</th>
                                <th>{{__('areamodule::city.name')}}</th>
                                <th>{{__('areamodule::city.governmentName')}}</th>
                                <th>{{__('areamodule::city.operation')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($city as $item)
                                <tr>
                            <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <!-- <td> {{$item->id}} </td> -->
                                    <td> {{$item->name}} </td>
                                    <td> {{$item->government->name}} </td>
                                    <td>
                                        {{-- Edit --}}
                                        <a title="Edit" href="{{url('admin-panel/city/' . $item->id . '/edit')}}" type="button" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        {{-- Delete --}}
                                        <form class="inline" action="{{url('admin-panel/city/' . $item->id)}}" method="POST">
                                            {{ method_field('DELETE') }} {!! csrf_field() !!}
                                            <button title="Delete" type="submit" onclick="return confirm('Are you sure, You want to delete this Data?')" type="button"
                                                    class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection

@section('javascript')


    @include('commonmodule::includes.swal')

    <!-- page script -->
    <!-- DataTables -->
    <script src="{{asset('assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('#CountryIndex').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false,
                "scrollX": true,

            });
        })

    </script>
@endsection
