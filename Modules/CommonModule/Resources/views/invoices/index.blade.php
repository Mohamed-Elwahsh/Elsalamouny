@extends('commonmodule::layouts.master')
@section('title')
    Admin
@endsection
@section('page-header')
    <section class="content-header">
        <h1>
            Invoices
            <small></small>
        </h1>

    </section>
@endsection

@section('content')


    <section class="content">

        <div class="row">
            <div class="col-md-12">

                <a href="{{url('admin-panel/invoices/create')}}" class="btn btn-primary pull-right margin-bottom">
                    <i class="fa fa-plus"></i>
                    Generate
                </a>

            </div>
        </div>


        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            All Invoices </h3>
                        <div class="box-tools">

                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Amount</th>
                                <th>REF</th>

                            </tr>
                            @foreach($invoices as $in)
                                <tr>
                                    <td>{{$in->id}}</td>
                                    <td>{{ $in->name }}</td>
                                    <td>{{ $in->email }}</td>
                                    <td>{{ $in->amount }}</td>
                                    <td>{{ $in->merchant_ref }}</td>

                                    <td>
                                        <a href="{{url('admin-panel/invoices/delete/')}}/{{ $in->id }}" class="btn btn-danger btn-circle">
                                            <i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->

                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>

@endsection

@section('css')

@endsection

@section('js')

@endsection
