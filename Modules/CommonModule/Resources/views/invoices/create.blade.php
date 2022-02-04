@extends('commonmodule::layouts.master')
@section('title')
    Invoces
@endsection
@section('page-header')
    <section class="content-header">
        <h1>
            Generate Invoice
            <small></small>
        </h1>

    </section>
@endsection

@section('content')

    <section class="content">
        <div class="row">
            <!-- right column -->
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Generate Invoice</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post" action="{{url('/admin-panel/invoices/create')}}"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="box-body">

                            <div class="form-group">

                                <label for="category" class="col-sm-2 control-label">Merchant Ref</label>
                                <div class="col-sm-6 ">
                                    <input type="text" value="{{ rand(1,6666) }}" name="merchant_ref" class="form-control" />
                                </div>

                            </div>

                            <div class="form-group">

                                <label for="category" class="col-sm-2 control-label">Trip Name</label>
                                <div class="col-sm-6 ">
                                   <input type="text" name="trip_name" class="form-control" />
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label"> Name </label>
                                <div class="col-sm-6">
                                    <div class="box-body pad">
                                        <input name="name" class="form-control">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"> Email </label>
                                <div class="col-sm-6">
                                    <div class="box-body pad">
                                        <input name="email" class="form-control">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"> Amount </label>
                                <div class="col-sm-6">
                                    <div class="box-body pad">
                                        <input type="number" value="" step="" name="amount" class="form-control">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"> Currency </label>
                                <div class="col-sm-6">
                                    <div class="box-body pad">
                                        <input name="currency" value="USD" class="form-control">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label"> Start Date </label>
                                <div class="col-sm-6">
                                    <div class="box-body pad">
                                        <input name="start_date" id="datetimepicker" class="form-control">

                                    </div>
                                </div>
                            </div>



                        </div>

                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info center-block">Generate
                                <i class="fa fa-save"

                                   style="margin-left: 5px"></i>
                            </button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
                <!-- /.box -->
                <!-- general form elements disabled -->

                <!-- /.box -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>

@endsection

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.15.35/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/bower_components/select2/dist/css/select2.min.css')}}">

@endsection

@section('js')
    <script src="{{ asset('assets/bower_components/select2/dist/js/select2.min.js')}}"></script>

    <script>
        $('.select2').select2()
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.15.35/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/locale/de.js"></script>

    <script>
        $(function () {
            $('#datetimepicker').datetimepicker({
                locale: 'de',
                format: 'YYYY/MM/DD',
                defaultDate: new Date()
            });
        });
    </script>

@endsection
