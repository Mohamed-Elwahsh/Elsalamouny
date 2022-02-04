{{-- {{dd($blogs)}} --}}
@extends('sitemodule::layouts.master')

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
                                @foreach ($newsCategory as $category)
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
        <h1>جميع الأخبار</h1>
    </div>
    <!-- /container -->
</div>
<!-- /header -->

<main>

    <!-- /container -->
    </div>

    <!-- /results -->

    {{-- <div class="sub_header_in sticky_header">
        <div class="container">
            <h1>جميع الأخبار</h1>
        </div>
        <!-- /container -->
    </div> --}}
    <div class="container margin_60_35">

        <div class="row">

            @foreach ($allnews as $news)

            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="strip grid">
                    <figure>
                        <a href="{{ URL('/category/news/'.$news->id) }}"><img src="{{url('/')}}/images/newsImages/{{$news->photo}}" class="img-fluid" alt="">
                            <div class="read_more"><span>المزيد</span></div>
                        </a>
                        <small>{{$news->categories->title}}</small>
                    </figure>
                    <div class="wrapper">
                        <h3><a href="detail-restaurant.html">{{$news->title}}</a></h3>
                        <p>{!!$news->desc!!}</p>
                    </div>
                    <ul>
                        <span class="rating">
                            <i class="icon_star voted"></i><i class="icon_star voted"></i>
                            <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i>
                        </span>
                        <li>
                            <div class="score"><strong>9.0</strong></div>
                        </li>
                    </ul>
                </div>
            </div>

            @endforeach
        </div>
        <!-- /row -->

        <div class="pagination text-center">
            {{ $allnews->links() }}
        </div>

    </div>
    <!-- /container -->

</main>
@endsection
