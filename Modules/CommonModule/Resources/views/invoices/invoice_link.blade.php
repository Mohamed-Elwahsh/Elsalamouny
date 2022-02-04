@extends('commonmodule::layouts.master')
@section('title')
    Invoices
@endsection
@section('page-header')
    <section class="content-header">
        <h1>
            Payments
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
                        <h3 class="box-title"> Payment Generated Link </h3>
                    </div>
                    @php
                        $link = "http://booking2agaza.com/payments/checkout/".$id;
                    @endphp
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-2">
                                <h3> Link is </h3>
                            </div>
                            <div class="col-md-6">
                                <h3><a target="_blank" href="{{ $link }}"> {{ $link }} </a></h3>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                    </div>

                </div>
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>

@endsection

@section('css')

@endsection

@section('js')



@endsection
