@extends('sitemodule::layouts.master')
@section('css')
<!-- GOOGLE WEB FONT -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
							<img src="{{url('/')}}/front/img/Untitled-2.png" width="150" height="50" alt="" class="logo_sticky">
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
                    <li><a href="{{ URL('/category/categoryNews/'.$category->id) }}" value="{{ $category->id }}">{{ $category->title }}</a></li>
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

	<div class="sub_header_in sticky_header">
		<div class="container">
			<h1>{{ $news->title }}</h1>
		</div>
		<!-- /container -->
	</div>
	<!-- /sub_header -->

	<main>
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-9">
					<div class="singlepost">
						<figure><img alt="" class="img-fill" src="{{ asset('images/newsImages/' .$news->photo ) }}" style="width: 100%"></figure>
						<h1>{{ $news->title }}</h1>

						<div class="post-content">
                                <p>{{ $news->desc }}</p>

						</div>
						<!-- /post -->
                        <ul class="d-flex justify-content-between">
                            <span class="rating">
                                <i class="icon_star voted"></i><i class="icon_star voted"></i>
                                <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i>
                            </span>
                            <li>
                                <div class="score"><strong>9.0</strong></div>
                            </li>
                        </ul>
					</div>
					<!-- /single-post -->

					<hr>

				</div>
				<!-- /col -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!--/main-->
@endsection
