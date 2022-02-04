@extends('commonmodule::layouts.master')

@section('title')
{{__('commonmodule::sidebar.Contact-Us')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
   @endsection


@section('content-header')
    <section class="content-header">
        <h1>
            {{__('commonmodule::sidebar.Contact-Us')}}
        </h1>

    </section>
@endsection


@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">

                <!-- /.box-header -->
                <div class="box-body">
                    <table id="myTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>{{trans('blog::blog.id')}}</th>
                                <th>الاسم</th>
                                <th>رقم الهاتف</th>
                                <th>الوصف</th>
                                <th>المدونه</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                            <tr>
                                <td>{{$contact->id}}</td>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->phone}}</td>
                                <td>{{$contact->description}}</td>
                                {{-- <td>{{$contact->blog_id}}</td> --}}
                                <td>{{$contact->blogs->title}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
               <div style="margin:0 10px; text-align:left">
                {{ $contacts->links('vendor.pagination.default') }}
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

