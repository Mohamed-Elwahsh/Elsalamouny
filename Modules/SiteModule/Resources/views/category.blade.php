{{-- {{dd($blogs)}} --}}
@extends('sitemodule::layouts.master')

@section('content')
<header class="header_in">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <div id="logo">
                    <a href="{{route('siteIndex')}}">
                        <img src="{{url('/')}}/front/img/Untitled-2.png" width="150" height="50" alt="" class="logo_sticky">
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
    <!-- search_mobile -->
    <div class="layer"></div>
    <div id="search_mobile">
        <form action="{{ route('siteCategory') }}" method="GET">
        <a href="#" class="side_panel"><i class="icon_close"></i></a>
        <div class="custom-search-input-2">
            <div class="form-group">
                <input class="form-control" type="text" placeholder="What are you looking..">
                <i class="icon_search"></i>
            </div>
            <div class="form-group">
                <select class="wide" name="cities">
                    <option value="">المدن</option>
                    @foreach ($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
            </div>
            <select class="wide" name="category">
                <option value="">الاقسام</option>
                @foreach ($categories as $category)
                @if ($category->parent_id == null)
                <option value="{{$category->id}}">{{$category->title}}</option>
                @endif
                @endforeach
            </select>
            <input type="submit">
        </div>
        </form>
    </div>
    <!-- /search_mobile -->
</header>
<!-- /header -->
<main>
    <div id="results">
        <div class="container">
            <form action="{{ route('siteCategory') }}" method="GET">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-10">
                        <h4> نتايج البحث</h4>
                    </div>
                    <div class="col-lg-9 col-md-8 col-2">
                        <a href="#0" class="side_panel btn_search_mobile"></a> <!-- /open search panel -->
                        <div class="row g-0 custom-search-input-2 inner">

                            <div class="col-lg-5">
                                <select class="wide" name="cities">
                                    <option value="">المدن</option>
                                    @foreach ($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-5">
                                <select class="wide" name="category">
                                    <option value="">الاقسام</option>
                                    @foreach ($categories as $category)
                                    @if ($category->parent_id == null)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <input type="submit">
                            </div>
                        </div>
                    </div>
            </form>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
    </div>

    <!-- /results -->


    <div class="container margin_60_35">

        <div class="row">

            @foreach ($blogs as $blog)
            {{-- @if ($blog->is_featured == 1) --}}
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="strip grid">
                    <figure>
                        <a href="{{route('siteDetail',$blog->id)}}"><img src="{{url('/')}}/images/blog/{{$blog->photo}}" class="img-fluid" alt="">
                            <div class="read_more"><span>المزيد</span></div>
                        </a>
                        @foreach ($blog->categories as $cat)
                        @if ($cat->parent_id == null)
                        <small>{{$cat->title}}</small>
                        @endif
                        @if (count($category->child) > 0)
                            @foreach ($cat->child as $child)
                                <small>{{$child->title}}</small>
                            @endforeach
                            @endif
                        @endforeach
                        {{-- @foreach ($blog->categories as $category)
                        @if ($category->parent_id == null)
                        <small>{{$category->title}}</small>
                        @endif
                        @endforeach --}}
                    </figure>
                    <div class="wrapper">
                        <h3><a href="detail-restaurant.html">{{$blog->title}}</a></h3>
                        <small>{{ $blog->cities->name }}</small>
                        <p>{!!$blog->description!!}</p>
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
            {{-- @endif --}}
            @endforeach
        </div>
        <!-- /row -->

        <div class="pagination text-center">
            {{ $blogs->links() }}
        </div>
        {{-- <div class="pagination text-center">
            <a href="#">&laquo;</a>
            <a href="#">4</a>
            <a href="#">3</a>
            <a href="#" class="active">2</a>
            <a href="#">1</a>
            <a href="#">&raquo;</a>
        </div> --}}



    </div>
    <!-- /container -->

</main>
@endsection
