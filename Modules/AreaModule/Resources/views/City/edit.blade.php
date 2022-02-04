@extends('commonmodule::layouts.master')

@section('title')
 {{__('areamodule::city.citytitle')}}
@endsection

@section('css')

@endsection

@section('content-header')
<section class="content-header">
  <h1> {{__('areamodule::city.citytitle')}} </h1>

</section>
@endsection

@section('content')
<section class="content">
  <!-- Horizontal Form -->
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">{{__('areamodule::city.citytitle')}}</h3>
    </div>
    @if (count($errors) > 0)
      @foreach ($errors->all() as $item)
        <p class="alert alert-danger">{{$item}}</p>
      @endforeach
    @endif
    <!-- /.box-header -->
    <form class="form-horizontal" action="{{url('admin-panel/city/')}}/{{$city->id}}" method="POST" enctype="multipart/form-data">
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
                <label class="control-label col-sm-2" for="Name">{{__('areamodule::city.name')}} ({{ $lang->display_lang }}):</label>
                <div class="col-sm-8">
                  <input type="text" value="{{ $city->translate(''.$lang->lang)->name }}" autocomplete="off" class="form-control" placeholder="Write Name" name="{{$lang->lang}}[name]" required>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>


         {{-- government--}}
         <div class="form-group">
             <label class="control-label col-sm-2" for="government_id">{{__('areamodule::city.governmentName')}} : </label>
             <div class="col-sm-8">
                 <select class="form-control" name="government_id" id="gov" required>
                     @foreach($government as $government)
                     <option value="{{$government->id}}">{{ $government->translate(''.$lang->lang)->name }}</option>
                     @endforeach
                 </select>
             </div>
         </div>


      </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <a href="{{url('admin-panel/city')}}" type="button" class="btn btn-default">{{__('areamodule::city.cancel')}} &nbsp; <i class="fa fa-remove" aria-hidden="true"></i> </a>
      <button type="submit" class="btn btn-primary pull-right">{{__('areamodule::city.submit')}} &nbsp; <i class="fa fa-save"></i></button>
    </div>
    <!-- /.box-footer -->
    </form>
  </div>
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
                            $("#gov").append('<option value="" >اختر المحافظه</option>');
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
