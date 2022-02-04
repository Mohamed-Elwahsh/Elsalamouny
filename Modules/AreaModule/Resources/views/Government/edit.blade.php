@extends('commonmodule::layouts.master')

@section('title')
 {{__('areamodule::government.governmenttitle')}}
@endsection
 
@section('css')

@endsection
 
@section('content-header')
<section class="content-header">
  <h1> {{__('areamodule::government.governmenttitle')}} </h1>

</section>
@endsection
 
@section('content')
<section class="content">
  <!-- Horizontal Form -->
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">{{__('areamodule::government.governmenttitle')}}</h3>
    </div>
    @if (count($errors) > 0)
      @foreach ($errors->all() as $item)
        <p class="alert alert-danger">{{$item}}</p>
      @endforeach 
    @endif
    <!-- /.box-header -->
    <form class="form-horizontal" action="{{url('admin-panel/government/')}}/{{$government->id}}" method="POST" enctype="multipart/form-data">
      {{ method_field('PUT') }} {{ csrf_field() }}

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
                {{-- name --}}
                <label class="control-label col-sm-2" for="Name">{{__('areamodule::government.name')}} ({{ $lang->display_lang }}):</label>
                <div class="col-sm-8">
                  <input type="text" value="{{ $government->translate(''.$lang->lang)->name }}" autocomplete="off" class="form-control" placeholder="Write Name" name="{{$lang->lang}}[name]" required>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
    
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
              <a href="#seo{{ $lang->display_lang }}" data-toggle="tab">{{ $lang->display_lang }}</a>
            </li>
            @endforeach
          </ul>
    
    
          <div class="tab-content">
            @foreach($activeLang as $lang)
            <div class="tab-pane @if($loop->first) active @endif" id="seo{{ $lang->display_lang }}">
              <div class="form-group">
                {{-- Meta Title --}}
                <label class="control-label col-sm-2" for="title">{{trans('areamodule::government.mt')}} ({{ $lang->display_lang }}):</label>
                <div class="col-sm-8">
                  <input type="text" autocomplete="off" value="{{ $government->translate(''.$lang->lang)->meta_title }}" class="form-control" placeholder="Write information about your title" name="{{ $lang->lang}}[meta_title]">
                </div>
    
              </div>
              <div class="form-group">
                {{-- Meta Description --}}
                <label class="control-label col-sm-2" for="title">{{trans('areamodule::government.md')}} ({{ $lang->display_lang }}):</label>
                <div class="col-sm-8">
                  <textarea class="form-control" placeholder="Write information about your category" name="{{ $lang->lang}}[meta_desc]" cols="15"
                    rows="10">{{ $government->translate(''.$lang->lang)->meta_desc }}</textarea>
                </div>
              </div>
              <div class="form-group">
                {{-- Meta Keywords --}}
                <label class="control-label col-sm-2" for="title">{{trans('areamodule::government.tag')}} ({{ $lang->display_lang }}):</label>
                <div class="col-sm-8">
                  <input type="text" autocomplete="off" value="{{ $government->translate(''.$lang->lang)->meta_keywords }}" class="form-control" placeholder="Enter Tags" name="{{ $lang->lang }}[meta_keywords]">
                </div>
              </div>
            </div>
            @endforeach
    
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
    
      </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <a href="{{url('admin-panel/government')}}" type="button" class="btn btn-default">{{__('areamodule::government.cancel')}} &nbsp; <i class="fa fa-remove" aria-hidden="true"></i> </a>
      <button type="submit" class="btn btn-primary pull-right">{{__('areamodule::government.submit')}} &nbsp; <i class="fa fa-save"></i></button>
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
