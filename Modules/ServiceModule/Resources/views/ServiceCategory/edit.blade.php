@extends('commonmodule::layouts.master')

@section('title')
  {{__('servicemodule::service.categtitle')}}
@endsection

@section('content-header')
<section class="content-header">
    <h1> {{__('servicemodule::service.categtitle')}} </h1>

</section>
@endsection

@section('content')
<section class="content">
  <!-- Horizontal Form -->
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">{{__('servicemodule::service.categtitle')}}</h3>
    </div>
    @if (count($errors) > 0)
      @foreach ($errors->all() as $item)
        <p class="alert alert-danger">{{$item}}</p>
      @endforeach
    @endif
    <!-- /.box-header -->
    <form class="form-horizontal" action="{{url('admin-panel/servicemodule/category')}}/{{$category->id}}" method="POST" enctype="multipart/form-data">
      {{method_field('PUT')}}
      {{ csrf_field() }}

      <div class="box-body">

        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">

              @foreach($activeLang as $lang)
              <li @if($loop->first) class="active" @endif>
                <a href="#{{ $lang->display_lang }}" data-toggle="tab">{{ $lang->display_lang }}</a>
              </li>
              @endforeach

            </ul>

            <div class="tab-content">
              @foreach($activeLang as $lang)

              <div class="tab-pane @if($loop->first) active @endif" id="{{ $lang->display_lang }}">
                <div class="form-group">
                  {{-- title --}}
                  <label class="control-label col-sm-2" for="title">{{__('servicemodule::service.title')}} ({{ $lang->display_lang }}):</label>
                  <div class="col-sm-8">
                    <input id="title_{{$lang->lang}}" class="form-control" value="{{ ValueOf($category,$lang,'title') }}" name="{{$lang->lang}}[title]" @if($loop->first) required @endif>
                  </div>
                </div>

                <div class="form-group">
                  {{-- Description --}}
                  <label class="control-label col-sm-2" for="title">{{__('servicemodule::service.desc')}} ({{$lang->display_lang}}):</label>
                  <div class="col-sm-8">
                    <textarea id="editor{{$lang->id}}" name="{{$lang->lang}}[description]" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                      {{ ValueOf($category,$lang,'description') }}
                    </textarea>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <!-- /.tab-content -->
          </div>
            <div class="form-group">
                <label class="col-md-6">@lang('servicemodule::service.photo')</label>
                <input class="col-md-6" type="file"  name="photo" >
                <img style="width: 100px;height: 100px" src="{{ url('images/service/'.$category->photo) }}">
            </div>

            <div class="form-group">
                <label class="col-md-6">@lang('servicemodule::service.cover_photo')</label>
                <input class="col-md-6" type="file"  name="cover_photo" >
                <img style="width: 100px;height: 100px" src="{{ url('images/service/'.$category->cover_photo) }}">
            </div>
          <!-- /.nav-tabs-custom -->
     

        
        <div class="form-group">
                            <div class="box-header">
                                <pre><h4>SEO Columns : </h4></pre>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    @foreach($activeLang as $lang)
                                        <li @if($loop->first) class="active" @endif >
                                            <a href="#seo{{ $lang->display_lang }}"
                                               data-toggle="tab">{{ $lang->display_lang }}</a>
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="tab-content">
                                    @foreach($activeLang as $lang)
                                        <div class="tab-pane @if($loop->first) active @endif"
                                             id="seo{{ $lang->display_lang }}">


                                            <div class="form-group">
                                                {{-- Meta Title --}}
                                                <label class="control-label col-sm-2"
                                                       for="title"> @lang('servicemodule::service.mt') :</label>
                                                <div class="col-sm-8">
                                                    <input id="meta_title_{{ $lang->lang }}" type="text"
                                                           autocomplete="off" class="form-control"
                                                           name="{{ $lang->lang }}[meta_title]"
                                                           value="{{ ValueOf($category, $lang, 'meta_title') }}">
                                                    <span id="titleSpan_{{ $lang->lang }}"></span>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                {{-- Meta Description --}}
                                                <label class="control-label col-sm-2"
                                                       for="desc"> @lang('servicemodule::service.md') :</label>
                                                <div class="col-sm-8">
                                            <textarea  id="meta_desc_{{$lang->lang}}" class="form-control" autocomplete="off"
                                                      name="{{ $lang->lang }}[meta_desc]" cols="15"
                                                      rows="2">{{ ValueOf($category, $lang, 'meta_desc') }}</textarea>
                                                    <span id="descSpan_{{$lang->lang}}"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                {{-- Meta Keywords --}}
                                                <label class="control-label col-sm-2" for="tags"> Meta Keywords
                                                 :</label>
                                                <div class="col-sm-8">
                                                    <input  id="countKeyWords{{$lang->lang}}" autocomplete="off"
                                                           type="text" class="form-control"
                                                           name="{{ $lang->lang }}[meta_keywords]"
                                                           value="{{ ValueOf($category, $lang, 'meta_keywords') }}">
                                                    <span id="tagsSpan"></span>
                                                </div>
                                            </div>

                                            <!-- Slug -->
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="slug">Slug : </label>
                                                <div class="col-sm-8">
                                                    <input id="slug_{{$lang->lang}}" type="text" autocomplete="off" class="form-control"
                                                           name="{{ $lang->lang }}[slug]"
                                                           value="{{ ValueOf($category, $lang, 'slug') }}">
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach


                                </div>
                                <!-- /.tab-content -->



      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <a href="{{url('admin-panel/servicemodule/category')}}" type="button" class="btn btn-default">{{__('servicemodule::service.cancel')}} &nbsp; <i class="fa fa-remove" aria-hidden="true"></i> </a>
        <button type="submit" class="btn btn-primary pull-right">{{__('servicemodule::service.submit')}} &nbsp; <i class="fa fa-save"></i></button>
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
    CKEDITOR.replace('editor'+"{{$lang->id }}" );
  });

</script>
@endforeach

@include('commonmodule::includes.slug');

@endsection
