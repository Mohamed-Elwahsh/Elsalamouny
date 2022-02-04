<footer class="plus_border">
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <h3 data-bs-target="#collapse_ft_1">لينكات سريعه</h3>
                <div class="collapse dont-collapse-sm" id="collapse_ft_1">
                    <ul class="links">
                        <li><a href="{{route('siteIndex')}}">الرئيسيه</a></li>
                        <li><a href="#0">من نحن</a></li>
                        <li><a href="#0">تواصل معنا</a></li>
                        <li><a href="{{route('addBlog')}}">اضافة اعلان</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <h3 data-bs-target="#collapse_ft_2">الاقسام</h3>
                <div class="collapse dont-collapse-sm" id="collapse_ft_2">
                    <ul class="links">
                        @foreach ($categories as $category)
                        @if ($category->parent_id == null)
                        <li><span><a href="{{route('siteShowCategory',$category->id)}}">{{$category->title}}</a></span>
                        @endif
                    </li>
                    @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <h3 data-bs-target="#collapse_ft_3">تواصل معنا</h3>
                <div class="collapse dont-collapse-sm" id="collapse_ft_3">
                    <ul class="contacts">
                        <li><i class="ti-home"></i>مصر - القاهره</li>
                        <li><i class="fas fa-phone"></i><a href="tel:201094741567" id="link-98064">201094741567</a></li>
                        {{-- <a href="tel:201094741567" id="link-98064"><i class="fas fa-phone mx-1"></i>201094741567</a> --}}
                        <li><i class="ti-email"></i><a href="#0">info@elslamonygroup.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                {{-- <h3 data-bs-target="#collapse_ft_4">Keep in touch</h3> --}}
                <div class="collapse dont-collapse-sm" id="collapse_ft_4">

                    <div class="follow_us">
                        <h5>تابعنا</h5>
                        <ul>
                            <li><a href="#0"><i class="ti-facebook"></i></a></li>
                            <li><a href="#0"><i class="ti-twitter-alt"></i></a></li>
                            <li><a href="#0"><i class="ti-google"></i></a></li>
                            <li><a href="#0"><i class="ti-pinterest"></i></a></li>
                            <li><a href="#0"><i class="ti-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row-->
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <ul id="footer-selector">
                    <li>
                        {{-- <img src="{{url('/')}}/front/img/logoDot.png" alt="" class="img-fluid" style="height: 30px; width:100px"> --}}
                        {{-- <h4><span style="color: #32a067">DOT</span>BYTES</h4> --}}
                    </li>

                </ul>
            </div>
            <div class="col-lg-6">
                <ul id="additional_links">
                    <li><a href="#0">Terms and conditions</a></li>
                    <li><a href="#0">Privacy</a></li>
                    <li><p>تم التنفيذ بواسطه
                        <a href="https://dotbytes.net/" target="_blank">DotBytes</a>
                    </p></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
