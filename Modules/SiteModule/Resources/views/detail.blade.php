@extends('sitemodule::layouts.master')

@section('content')
<header class="header_in">
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
                        <li><span><a href="{{route('siteIndex')}}">الرئيسيه</a></span>

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

<main>

    <nav class="secondary_nav sticky_horizontal_2">
        <div class="container">
            <ul class="clearfix">
                <li><a href="" class="active">{{$blogs->title}}</a></li>
                <li><a href="#reviews"></a></li>
                {{-- <li><a href="#sidebar">Booking</a></li> --}}
            </ul>
        </div>
    </nav>

    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-8">
                <div id="carousel_in" class="owl-carousel owl-theme add_bottom_30">
                    <div class="item"><img src="{{url('/')}}/images/blog/{{$blogs->photo}}" alt=""></div>

                </div>
                <section id="description">
                    <div class="detail_title_1">
                        <div class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i
                                class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></div>
                        <h1>{{$blogs->title}}</h1>
                        <h4>{{$blogs->cities->name}}</h4>
                    </div>
                    <p>{!!$blogs->description!!}</p>
                    <p>{{$blogs->short_desc}}</p>
                    <h5 class="add_bottom_15">الأقسام</h5>
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

            <aside class="col-lg-4" id="sidebar">
                <div class="box_detail booking">
                    <div class="price">
                        <span>تواصل معنا</span>
                        {{-- <div class="score"><span></span><strong>9.0</strong></div> --}}
                    </div>


                    <form action="{{route('siteContact')}}" method="POST">
                        @csrf
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        <div class="form-group" id="input-dates">
                            <label>الاسم</label>
                            <input class="form-control" type="text" name="name" value="{{old('name')}}"
                                placeholder="ادخل الاسم كامل" class="@error('name') is-invalid @enderror">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group" id="input-dates">
                            <input class="form-control" type="hidden" name="blog_id" value="{{$blogs->id}}">

                        </div>
                        <div class="form-group" id="input-dates">
                            <label>رقم الهاتف</label>
                            <input class="form-control" type="text" name="phone" value="{{old('phone')}}"
                                placeholder="ادخل رقم الهاتف" class="@error('phone') is-invalid @enderror">
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group" id="input-dates">
                            <label>الوصف</label>
                            <textarea name="description" class="textarea"
                                class="@error('description') is-invalid @enderror"
                                style="width: 100%; height: 80px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{  old('description') }}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
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
                        <!-- /dropdown -->

                        <input type="submit" value="تسجيل" class="add_top_30 btn_1 full-width purchase">
                    </form>
                </div>
                <ul class="share-buttons">
                    {{-- <li><a class="fb-share" href="https://api.addthis.com/oexchange/0.8/forward/facebook/offer?url={{route('siteDetail',$blogs->id)}}&title=AddThis%20-%20Get%20likes%2C%20get%20shares%2C%20get%20followers&pco=tbxnj-1.0" target="_blank"><i class="social_facebook"></i> Share</a></li>
                    <li><a class="twitter-share" href="https://api.addthis.com/oexchange/0.8/forward/twitter/offer?url={{route('siteDetail',$blogs->id)}}&title=AddThis%20-%20Get%20likes%2C%20get%20shares%2C%20get%20followers&pco=tbxnj-1.0" target="_blank"><i class="social_twitter"></i> Share</a></li>
                    <li><a class="gplus-share" href="https://api.addthis.com/oexchange/0.8/forward/google_plusone_share/offer?url={{route('siteDetail',$blogs->id)}}&title=AddThis%20-%20Get%20likes%2C%20get%20shares%2C%20get%20followers&pco=tbxnj-1.0" target="_blank"><i class="social_googleplus"></i> Share</a></li> --}}
                </ul>
            </aside>
        </div><!-- Go to www.addthis.com/dashboard to customize your tools -->
        <!-- /row -->
    </div>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->


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
{{-- <script>
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
</script> --}}
@endsection
