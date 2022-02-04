@extends('sitemodule::layouts.master')
@section('css')
{{--
<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4.3.2/css/metro-all.min.css"> --}}
{{--
<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css"> --}}
{{-- Metro CSS --}}
<link rel="stylesheet" href="{{asset('assets/admin/treeview.css')}}">

@endsection
@section('content')
<header class="header_in is_sticky menu_fixed">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <div id="logo">
                    <a href="{{route('siteIndex')}}">
                        <img src="{{url('/')}}/front/img/Untitled-2.png" width="150" height="50" alt=""
                            class="logo_sticky">
                    </a>
                </div>
            </div>
            <div class="col-lg-9 col-12">
                <ul id="top_menu">
                    <li><a href="{{route('addBlog')}}" class="btn_add">اضافة اعلان</a></li>

                </ul>
                <!-- /top_menu -->
                <a href="#menu" class="btn_mobile">
                    <div class="hamburger hamburger--spin" id="hamburger">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </a>


                <nav id="menu" class="main-menu">
                    <ul>
                        <li><span><a href="{{route('siteIndex')}}">الرئيسيه</a></span></li>

                        @foreach ($categories as $category)
                        @if ($category->parent_id == null)
                        <li><span><a href="{{route('siteShowCategory',$category->id)}}">{{$category->title}}</a></span>
                            @endif
                            @if (count($category->child) > 0)
                            <ul>
                                @foreach ($category->child as $child)
                                <li><a href="{{route('siteShowCategory',$child->id)}}">{{ $child->title }}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                        <li><span><a href="" data-bs-toggle="dropdown">المدونة</a></span>
                            <ul>
                                @foreach ($newsCayegory as $category)
                                <li><a href="{{ URL('/category/categoryNews/'.$category->id) }}" value="{{ $category->id }}">{{
                                        $category->title }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><span><a href="#0">من نحن</a></span>
                        <li><span><a href="#0">تواصل معنا</a></span>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</header>
<!-- /header -->

<div class="sub_header_in sticky_header">
    <div class="container">
        <h1>اضافة اعلان</h1>
    </div>
    <!-- /container -->
</div>
<!-- /sub_header -->

<main>
    <div class="container margin_60">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-8">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <form class="form-horizontal" id="createform" action="{{route('addNewblog')}}" id="registration-form"
                    method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="box-body">

                        <div class="col-md-12">
                            <div class="nav-tabs-custom">

                                <div class="tab-content">
                                    @foreach($activeLang as $lang)
                                    <div class="tab-pane @if($loop->first) active @endif"
                                        id="{{ $lang->display_lang }}">

                                        <div class="mb-3">
                                            {{-- Title --}}
                                            <label class="control-label col-sm-2"
                                                for="title">{{trans('blog::blog.title')}}({{ $lang->display_lang
                                                }}):</label>

                                            <input id="title_{{$lang->lang}}" type="text" autocomplete="off"
                                                class="form-control" name="{{$lang->lang}}[title]" @if($loop->first)
                                            required @endif>

                                        </div>

                                        <div class="mb-3">
                                            {{-- Description --}}
                                            <label class="control-label col-sm-2"
                                                for="title">{{trans('blog::blog.desc')}} ({{$lang->display_lang}}
                                                ):</label>

                                            <textarea id="editor2{{$lang->id}}" class="textarea"
                                                name="{{$lang->lang}}[description]"
                                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                                        </div>

                                        <div class="mb-3">
                                            {{-- Short Description --}}
                                            <label class="control-label col-sm-2"
                                                for="title">{{trans('blog::blog.shortdisc')}}
                                                ({{$lang->display_lang}}):</label>

                                            <textarea id="shortDesc{{$lang->id}}" class="textarea"
                                                name="{{$lang->lang}}[short_desc]"
                                                style="width: 100%; height: 80px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                                        </div>


                                    </div>
                                    @endforeach
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>

                        <div class="mb-3">
                            <label class="control-label col-sm-2">{{__('blog::blog.category')}} : </label>

                            <ul data-role="treeview-metro">

                                @foreach($categories as $cat)
                                <li>
                                   @if ($cat->parent_id == null)
                                   <input class="intree" data-validation="checkbox_group" data-validation-qty="min1"
                                   type="checkbox" data-role="checkbox" value="{{ $cat->id  }}"
                                   name="blog_category_id[]" data-caption="{{ $cat->title  }}" title="">
                                   @endif
                                    @if(count($cat->child)>0)
                                    <ul>
                                        @foreach($cat->child as $child)
                                        <li class="mx-4"><input type="checkbox" selected data-role="checkbox"
                                                value="{{ $child->id  }}" name="blog_category_id[]"
                                                data-caption="{{ $child->title  }}" title=""></li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>

                        </div>


                        <div class="mb-3">

                            <label class="control-label col-sm-2" for="title">
                                المدينة:</label>

                            <select class="form-control" name="city_id">
                                <option value="">اختر المدينه</option>
                                @foreach($cities as $city)
                                <option value="{{ $city->id }}">
                                    <pre>&nbsp;&nbsp;&nbsp;</pre>{{ $city->name }}
                                </option>
                                @endforeach
                            </select>

                        </div>


                        <div class="mb-3">
                            {{-- Upload photo --}}
                            <label class="control-label col-sm-2" for="img"> {{trans('blog::blog.photo')}} </label>

                            <input type="file" autocomplete="off" class="" name="photo">

                        </div>

                        <div class="mb-3">
                            <label hidden class="control-label col-sm-2" for="img">{{__('blog::blog.feature')}}</label>
                            <label hidden><input type="radio" disabled  name="is_featured" value="1"> Yes</label>
                            <label hidden><input type="radio" disabled  name="is_featured" value="0" checked> No</label>
                        </div>


                        <!-- seoooo -->
                        <div class="mb-3">
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                        </div>
                        @if ($errors->has('g-recaptcha-response'))
                        <div class="alert alert-danger">تأكيد الشخصيه مطلوب</div>
                            {{-- <span class="help-block">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                            </span> --}}
                        @endif
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="text-center"><input type="submit" value="{{trans('blog::blog.submit')}}"
                                class="btn_1 full-width"></div>

                    </div>
                    <!-- /.box-footer -->
                </form>

                <!-- /box_account -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>
<!--/main-->
@endsection

@section('js')
{{-- <script src="https://cdn.metroui.org.ua/v4.3.2/js/metro.min.js"></script> --}}
{{-- <script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script> --}}
{{-- Treeview --}}
<script src="{{asset('front/metro.js')}}"> </script>

<script src="{{asset('assets/admin/bower_components/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/bower_components/ckeditor/ckfinder/ckfinder.js')}}"></script>

<script src="{{ asset('assets/admin/bower_components/select2/dist/js/select2.min.js')}}"></script>

<script>
    CKFinder.setupCKEditor();

    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();
    });
</script>


<!-- jQuery form validator -->
<script src="{{asset('assets/admin/plugins/jquery_form_validator/jquery.form-validator.min.js')}}"></script>
<script>
    $.validate({
        form : '#createform',
    onError : function($form) {
        alert('Error, Make sure of your Data, Validation failed!');
        return false;
    },

});
</script>

@foreach ($activeLang as $lang)
<script>
    $(function () {
            CKEDITOR.replace('editor2' + '{{$lang->id}}');
        });
</script>
@endforeach


@include('commonmodule::includes.slug');
@endsection
