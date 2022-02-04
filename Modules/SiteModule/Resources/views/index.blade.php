@extends('sitemodule::layouts.master')

@section('content')
<header class="header menu_fixed">
    <div id="logo">
        <a href="{{route('siteIndex')}}" title="Sparker - Directory and listings template">
            <img src="{{url('/')}}/front/img/Untitled-2.png" width="150" height="50" alt="" class="logo_normal">
            <img src="{{url('/')}}/front/img/Untitled-2.png" width="150" height="50" alt="" class="logo_sticky">
        </a>
    </div>
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


            <li><span><a href="#0">من نحن</a></span></li>
            <li><span><a href="#0">تواصل معنا</a></span></li>

        </ul>
    </nav>
</header>

<main class="pattern">


    <section class="hero_single version_2">
        <div class="wrapper">
            <div class="container">
                <h3>اعثر على ما تحتاجه!</h3>
                <!-- <p>اكتشف الفنادق والمتاجر والمطاعم الأعلى تصنيفًا حول العالم</p> -->
                <form action="{{ route('siteCategory') }}" method="GET">
                    <div class="row g-0 custom-search-input-2">
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
                            <input type="submit" value="بحث">
                        </div>
                    </div>
                    <!-- /row -->
                </form>
            </div>
        </div>
    </section>
    <!-- /hero_single -->

    <div class="container margin_60_35">
        @foreach ($BlogCategories as $category)
        @if (count($category->blogs) > 0)
        <div class="main_title_3">
            <span></span>
            <h2>{{$category->title}}</h2>
            <p>{!!$category->description!!}</p>
            <a href="{{route('siteShowCategory',$category->id)}}">اظهار الكل</a>
        </div>
        <div class="row add_bottom_30">
            @foreach ($category->blogs->take(4) as $blog)
            @if ($blog->is_featured == 1)
            <div class="col-lg-3 col-sm-6">
                <a href="{{route('siteDetail',$blog->id)}}" class="grid_item small">
                    <figure>
                        <img src="{{url('/')}}/images/blog/{{$blog->photo}}" alt="">
                        <div class="info">
                            <h3>{{$blog->title}}</h3>
                        </div>
                    </figure>
                </a>
            </div>
            @endif
            @endforeach
        </div>
        @endif
        @endforeach
        <!-- /row -->
    </div>
    <!-- /container -->

    <div class="call_section">
        <div class="wrapper">
            <div class="container margin_80_55">
                <div class="main_title_2">
                    <span><em></em></span>
                    <h2>كيف تعمل</h2>
                    {{-- <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p> --}}
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="box_how">
                            <i class="pe-7s-search"></i>
                            <h3>Search Locations</h3>
                            <p>An nec placerat repudiare scripserit, temporibus complectitur at sea, vel ignota fierent
                                eloquentiam id.</p>
                            <span></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box_how">
                            <i class="pe-7s-info"></i>
                            <h3>View Location Info</h3>
                            <p>An nec placerat repudiare scripserit, temporibus complectitur at sea, vel ignota fierent
                                eloquentiam id.</p>
                            <span></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box_how">
                            <i class="pe-7s-like2"></i>
                            <h3>Book, Reach or Call</h3>
                            <p>An nec placerat repudiare scripserit, temporibus complectitur at sea, vel ignota fierent
                                eloquentiam id.</p>
                        </div>
                    </div>
                </div>
                <!-- /row -->
                {{-- <p class="text-center add_top_30 wow bounceIn" data-wow-delay="0.5s"><a href="account.html"
                        class="btn_1 rounded">Register Now</a></p> --}}
            </div>
            <canvas id="hero-canvas" width="1920" height="1080"></canvas>
        </div>
        <!-- /wrapper -->
    </div>
    <!--/call_section-->
    <div class="container margin_80_55">
        <div class="main_title_2">
            <span><em></em></span>
            <h2>أخر أخبار</h2>
        </div>
        <div class="row">
            @foreach ($allnews as $news)
            <div class="col-lg-6">
                <a class="box_news" href="{{ URL('/category/news/'.$news->id) }}">
                    <figure><img src="{{url('/')}}/images/newsImages/{{$news->photo}}" alt=""></figure>
                    <ul>
                        <li>{{$news->categories->title}}</li>
                        <li>{{$news->created_at}}</li>
                    </ul>
                    <h4>{{$news->title}}</h4>
                    <p>{{$news->desc}}</p>
                </a>
            </div>
            @endforeach
            <!-- /box_news -->
        </div>
        <!-- /row -->
        <p class="btn_home_align"><a href="{{route('allNews')}}" class="btn_1 rounded">عرض كل الأخبار</a></p>
    </div>

    <!-- /container -->

</main>
@endsection

