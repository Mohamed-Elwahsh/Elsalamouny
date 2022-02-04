@extends('commonmodule::layouts.master')

@section('title')
   {{__('newsmodule::category.sections')}}
@endsection

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/admin/bower_components/select2/dist/css/select2.min.css')}}">
@endsection

@section('content-header')
    <section class="content-header">
        <h1> {{__('newsmodule::category.sections')}} </h1>

    </section>
@endsection

@section('content')
    <section class="content">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"> {{__('newsmodule::category.sections')}}</h3>
            </div>
            @if (count($errors) > 0)
                @foreach ($errors->all() as $item)
                    <p class="alert alert-danger">{{$item}}</p>
            @endforeach
        @endif
        <!-- /.box-header -->
            <form class="form-horizontal" action="{{url('admin-panel/category')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">

                                @foreach($activeLang as $lang)
                                    <li @if($loop->first) class="active" @endif >
                                        <a href="#{{ $lang->display_lang }}" data-toggle="tab">{{ $lang->display_lang }}</a>
                                    </li>
                                @endforeach

                            </ul>
                            <div class="tab-content">
                                @foreach($activeLang as $lang)
                                    <div class="tab-pane @if($loop->first) active @endif" id="{{ $lang->display_lang }}">
                                        <div class="form-group">
                                            {{-- title --}}
                                            <label class="control-label col-sm-2" for="Name"> {{__('newsmodule::category.name')}} ({{ $lang->display_lang }}):</label>
                                            <div class="col-sm-8">
                                                <input type="text" autocomplete="off" class="form-control" placeholder="Write Name" name="{{$lang->lang}}[title]" required>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                
                <!-- /.box-body -->
                </div>
                <div class="box-footer">
                    <a href="{{url('/admin-panel/category')}}" type="button" class="btn btn-default">{{__('newsmodule::category.cancel')}} &nbsp; <i class="fa fa-remove" aria-hidden="true"></i> </a>
                    <button type="submit" class="btn btn-primary pull-right">{{__('newsmodule::category.submit')}} &nbsp; <i class="fa fa-save"></i></button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </section>
@endsection

@section('javascript')
    <!-- CK Editor -->
    <script src="{{asset('assets/admin/bower_components/ckeditor/ckeditor.js')}}"></script>

    @foreach ($activeLang as $lang)
        <script>
            $(function () {
                CKEDITOR.replace('editor' + {{$lang->id}});
            });

        </script>
    @endforeach

@endsection
