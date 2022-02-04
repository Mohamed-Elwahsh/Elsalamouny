@extends('sitemodule::layouts.master')
@section('css')
<!-- BASE CSS -->
<link href="{{url('/')}}/news/css/bootstrap-rtl.min.css" rel="stylesheet">
<link href="{{url('/')}}/news/css/style.css" rel="stylesheet">
<link href="{{url('/')}}/news/css/style-rtl.css" rel="stylesheet">
<link href="{{url('/')}}/news/css/vendors.css" rel="stylesheet">

<!-- SPECIFIC CSS -->
<link href="{{url('/')}}/news/css/blog.css" rel="stylesheet">
<link href="{{url('/')}}/news/css/blog-rtl.css" rel="stylesheet">

<!-- YOUR CUSTOM CSS -->
<link href="{{url('/')}}/news/css/custom.css" rel="stylesheet">
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
                    <li><a href="{{route('addBlog')}}" class="btn_add">إضافة إعلان</a></li>
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
                        <li><span><a href="{{route('siteIndex')}}">الرئيسية</a></span>
                        </li>

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
                                @foreach ($allCategory as $category)
                                <li><a href="{{ URL('/category/categoryNews/'.$category->id) }}"
                                        value="{{ $category->id }}">{{ $category->title }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><span><a href="#0">من نحن</a></span></li>
                        <li><span><a href="#0">تواصل معنا</a></span></li>
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
        <h1>كل الأخبار</h1>
    </div>
    <!-- /container -->
</div>
<!-- /sub_header -->

<main>
    <div class="container margin_60_35 ">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @foreach( $allNews as $news )
                    <div class="col-md-4">
                        <article class="blog">
                            <figure>
                                <a href="{{ URL('/category/news/'.$news->id) }}"><img
                                        src="{{url('/')}}/images/newsImages/{{$news->photo}}" alt="">
                                </a>
                            </figure>
                            <div class="post_info">
                                <!-- <small>{{ $category->title }}</small> -->
                                <h2><a href="{{ URL('/category/news/'.$news->id) }}"> {{ $news->title }} </a></h2>
                                <p>{{ $news->short_desc }}</p>

                            </div>
                            <ul class="d-flex justify-content-between mx-4">
                                <span class="rating mt-1">
                                    <i class="icon_star voted"></i><i class="icon_star voted"></i>
                                    <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i>
                                </span>
                                <li>
                                    <div class="score mb-3"><strong>9.0</strong></div>
                                </li>
                            </ul>
                        </article>
                        <!-- /article -->

                    </div>
                    <!-- /col -->
                    <!-- /col -->
                    @endforeach
                </div>
                <!-- /row -->

                <div class="pagination__wrapper add_bottom_30">
                    <ul class="pagination">
                        <li><a href="#0" class="prev" title="previous page">&#10094;</a></li>
                        <li>
                            <a href="#0" class="active">1</a>
                        </li>
                        <li>
                            <a href="#0">2</a>
                        </li>
                        <li>
                            <a href="#0">3</a>
                        </li>
                        <li>
                            <a href="#0">4</a>
                        </li>
                        <li><a href="#0" class="next" title="next page">&#10095;</a></li>
                    </ul>
                </div>
                <!-- /pagination -->

            </div>
            <!-- /col -->

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>
<!--/main-->
@endsection
