@extends('commonmodule::layouts.master')

@section('title')
{{__('commonmodule::sidebar.Ads')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection


@section('content-header')
    <section class="content-header">
        <h1>
            {{-- {{__('commonmodule::sidebar.Ads')}} --}}
            {{$blogs->title}}
        </h1>

    </section>
@endsection

@section('content')


<main>

    {{-- <nav class="secondary_nav sticky_horizontal_2">
        <div class="container">
            <ul class="clearfix">
                <li><a href="" class="active">{{$blogs->title}}</a></li>

            </ul>
        </div>
    </nav> --}}

    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-8">
                <div id="carousel_in" class="owl-carousel owl-theme add_bottom_30">
                    <div class="item">
                        <img src="{{url('/')}}/images/blog/{{$blogs->photo}}" alt="" style="width: 40%">
                    </div>

                </div>
                <section id="description">
                    <div class="detail_title_1">
                        <div class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i
                                class="icon_star"></i><i class="icon_star"></i></div>
                        <h1><span style="font-weight: blod">الاسم :</span> {{$blogs->title}}</h1>
                        <h4><span style="font-size:2.2rem">المدينه :</span> {{$blogs->cities->name}}</h4>
                    </div>
                    <p>
                        <span style="font-weight: blod; font-size:2.2rem;font-family: 'Cairo', sans-serif;">الوصف :</span>
                         {!!$blogs->description!!}
                    </p>
                    <p><span style="font-weight: blod; font-size:2.2rem;font-family: 'Cairo', sans-serif;">الوصف الصغير :</span> {{$blogs->short_desc}}</p>
                    <h5 class="add_bottom_15" style="font-weight: blod; font-size:2.2rem;font-family: 'Cairo', sans-serif;">الاقسام</h5>
                    <div class="row add_bottom_30">
                        <div class="col-lg-6">
                            <ul class="bullets">
                                @foreach ($blogs->categories as $cat)
                                <li>{{$cat->title}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- /row -->
                    <!-- End Map -->
                </section>
                <!-- /section -->
            </div>
            <!-- /col -->

        </div><!-- Go to www.addthis.com/dashboard to customize your tools -->
        <!-- /row -->
    </div>

</main>
<!--/main-->
@endsection
@section('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="http://maps.googleapis.com/maps/api/js"></script>
<!-- INPUT QUANTITY  -->
<script src="{{url('/')}}/front/js/input_qty.js"></script>
<script>
    $('#carousel_in').owlCarousel({
            center: false,
            items:1,
            loop:false,
            rtl: true,
            margin:0
        });
</script>

<!-- DATEPICKER  -->
<script>
    $(function() {
            $('input[name="dates"]').daterangepicker({
                autoUpdateInput: false,
                parentEl:'#input-dates',
                opens: 'right',
                minDate:new Date(),
                locale: {
                    direction: 'rtl',
                cancelLabel: 'Clear'
                }
            });
            $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('MM-DD-YY') + ' > ' + picker.endDate.format('MM-DD-YY'));
            });
            $('input[name="dates"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
        });
</script>

@endsection
