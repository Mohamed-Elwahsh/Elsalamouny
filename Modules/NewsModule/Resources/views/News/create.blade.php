@extends('commonmodule::layouts.master')

@section('title')
    {{__('newsmodule::news.news')}}
@endsection

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/admin/bower_components/select2/dist/css/select2.min.css')}}">
@endsection

@section('content-header')
    <section class="content-header">
        <h1> {{__('newsmodule::news.news')}} </h1>

    </section>
@endsection

@section('content')
    <section class="content">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{__('newsmodule::news.news')}}</h3>
            </div>
            @if (count($errors) > 0)
                @foreach ($errors->all() as $item)
                    <p class="alert alert-danger">{{$item}}</p>
            @endforeach
        @endif
        <!-- /.box-header -->
            <form class="form-horizontal" action="{{url('admin-panel/news')}}" method="POST" enctype="multipart/form-data">
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
                            </div>

                            <div class="tab-content">
                                @foreach($activeLang as $lang)

                                    <div class="tab-pane @if($loop->first) active @endif" id="{{ $lang->display_lang }}">
                                        <div class="form-group">
                                            {{-- name --}}
                                            <label class="control-label col-sm-2" for="Name">{{__('newsmodule::news.name')}} ({{ $lang->display_lang }}):</label>
                                            <div class="col-sm-8">
                                                <input type="text" autocomplete="off" class="form-control" placeholder="Write Name" name="{{$lang->lang}}[title]" required>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- /.tab-content -->
                        <!-- </div> -->
                        <!-- /.nav-tabs-custom -->


                    {{-- category--}}
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="government_id">{{__('newsmodule::news.categorytName')}} : </label>
                        <div class="col-sm-8">
                            <select class="form-control" name="category_id" id="gov" required>
                                <option value="">{{__('newsmodule::news.choose_section')}}</option>
                                @foreach($category as $category)
                                    <option value="{{$category->id}}">{{ $category->translate(''.$lang->lang)->title }}</option>
                                 @endforeach

                            </select>
                        </div>
                    </div>

                    
                    <div class="tab-content">
                        @foreach($activeLang as $lang)
                        
                        <div class="tab-pane @if($loop->first) active @endif" id="{{ $lang->display_lang }}">
                            <div class="form-group">
                                {{-- short description --}}
                                <label class="control-label col-sm-2" for="Name">{{__('newsmodule::news.short_desc')}} ({{ $lang->display_lang }}):</label>
                                <div class="col-sm-8">
                                    <input type="text" autocomplete="off" class="form-control" placeholder="Write Name" name="{{$lang->lang}}[short_desc]" required>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="tab-content">
                        @foreach($activeLang as $lang)
                        
                        <div class="tab-pane @if($loop->first) active @endif" id="{{ $lang->display_lang }}">
                            <div class="form-group">
                                {{-- description --}}
                                <label class="control-label col-sm-2" for="Name">{{__('newsmodule::news.desc')}} ({{ $lang->display_lang }}):</label>
                                <div class="col-sm-8">
                                    <textarea id="editor2{{$lang->id}}" class="textarea"
                                                name="{{$lang->lang}}[desc]"
                                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>                             
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="tab-content">
                                @foreach($activeLang as $lang)
    
                                    <div class="tab-pane @if($loop->first) active @endif" id="{{ $lang->display_lang }}">
                                        <div class="form-group">
                                            {{-- photo --}}
                                            <label class="control-label col-sm-2" for="Name">{{__('newsmodule::news.photo')}} :</label>
                                            <div class="col-sm-8">
                                                <input type="file" autocomplete="off" class="" placeholder="Write Name" name="photo" required>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                    </div>
                    
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{url('/admin-panel/news')}}" type="button" class="btn btn-default">{{__('newsmodule::news.cancel')}} &nbsp; <i class="fa fa-remove" aria-hidden="true"></i> </a>
                    <button type="submit" class="btn btn-primary pull-right">{{__('newsmodule::news.submit')}} &nbsp; <i class="fa fa-save"></i></button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </section>
    <script src="http://demo.expertphp.in/js/jquery.js"></script>
    <script type="text/javascript">
        $('#country').change(function () {
            var countryID = $(this).val();

            if (countryID) {
                $.ajax({
                    type: "GET",
                    url: "{{url('admin-panel/getGovernmentList')}}/" + countryID,
                    success: function (res) {
                        if (res) {
                            $("#gov").empty();
                            $("#gov").append('<option value="">اختر المحافظه</option>');
                            $.each(res, function (key, value) {
                                $("#gov").append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        } else {
                            $("#gov").empty();
                        }
                    }
                });
            }
        });
    </script>
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
