@extends('commonmodule::layouts.master')

@section('title')
{{__('commonmodule::sidebar.Ads')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
   @endsection


@section('content-header')
    <section class="content-header">
        <h1>
            {{__('commonmodule::sidebar.Ads')}}
        </h1>

    </section>
@endsection


@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">{{__('commonmodule::sidebar.Ads')}}</h3>
                    <a href="{{url('admin-panel/blogs/create')}}" type="button" class="btn btn-success pull-right">
                        <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; {{trans('blog::blog.createnew')}}</a>
                </div>
                {{-- {{ $blogs->links() }} --}}
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="myTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>{{trans('blog::blog.id')}}</th>
                                <th>{{trans('blog::blog.title')}}</th>
                                <th>{{trans('blog::blog.pic')}}</th>
                                <th>{{trans('blog::blog.op')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                            {{-- @if ($blog->is_featured == 0) --}}
                            <tr>
                                <td>{{$blog->id}}</td>
                                <td>{{$blog->title}}</td>
                                <td><img width="100" height="100"src="{{url('/')}}/images/blog/{{$blog->photo}}"></td>
                                <td>
                                    <a href="{{route('active',$blog->id)}}" class="btn btn btn-success">active</a>
                                    <a href="{{route('details',$blog->id)}}" class="btn btn btn-danger">details</a>

                                    {{-- <a href="'. url('admin-panel/blogs/delete', $blog->id) .'" class="btn btn btn-danger">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </a> --}}
                                </td>
                            </tr>
                            {{-- @endif --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div style="margin:0 10px; text-align:left">
                    {{ $blogs->links('vendor.pagination.default') }}
                   </div>
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

    <!-- DataTables -->
    <script src="{{asset('assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
@endsection
