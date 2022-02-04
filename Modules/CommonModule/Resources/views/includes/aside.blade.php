<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online ww</a>

            </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">{{__('commonmodule::sidebar.mainnav')}}</li>

            <!-- Common Module -->
            <li>
                <a href="{{url('/admin-panel')}}">
                    <i class="fa fa-home"></i> <span>{{__('commonmodule::sidebar.home')}} </span>
                    <span class="pull-right-container">
                </span>
                </a>
            </li>

                <li class="treeview">
                    <a href="#">
                    <i class="fa fa-newspaper-o"></i> <span>{{__('commonmodule::sidebar.news')}}</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <!-- Categories -->
                        <li><a href="{{ url('admin-panel/category') }}"><i
                                    class="fa fa-circle-o"></i> {{__('commonmodule::sidebar.newscateg')}}</a>
                        </li>

                        <!-- News -->
                        <li><a href="{{ url('admin-panel/news') }}"><i
                                    class="fa fa-circle-o"></i> {{__('commonmodule::sidebar.news')}}</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                    <i class="fa fa-newspaper-o"></i> <span>{{__('commonmodule::sidebar.Contact-Us')}}</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <!-- Ads -->
                        <li><a href="{{ route('contacts') }}"><i
                                    class="fa fa-circle-o"></i> {{__('commonmodule::sidebar.Contact-Us')}}</a>
                        </li>

                    </ul>
                </li>
            @if(in_array('service_app',$activeApps))
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-wrench"></i> <span>{{__('commonmodule::sidebar.service')}}</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <!-- Categories -->
                        <li><a href="{{ url('admin-panel/servicemodule/category') }}"><i
                                    class="fa fa-circle-o"></i> {{__('commonmodule::sidebar.servicecateg')}}</a>
                        </li>

                        <!-- Service -->
                        <li><a href="{{ url('admin-panel/servicemodule/service') }}"><i
                                    class="fa fa-circle-o"></i> {{__('commonmodule::sidebar.service')}}</a></li>
                    </ul>
                </li>
            @endif

            @if(in_array('blog_app',$activeApps))

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        <span>{{__('commonmodule::sidebar.Ads')}}</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <!-- Categories -->
                        <li><a href="{{ url('admin-panel/blog-categories') }}"><i
                                    class="fa fa-circle-o"></i>{{__('commonmodule::sidebar.blogcateg')}}</a></li>

                        <!-- Blog -->
                        <li><a href="{{ url('admin-panel/blogs') }}"><i
                                    class="fa fa-circle-o"></i> {{__('commonmodule::sidebar.Ads')}}</a></li>
                        <!-- Ads -->
                        <li><a href="{{ route('ads') }}"><i
                                class="fa fa-circle-o"></i> {{__('commonmodule::sidebar.customer ads')}}</a></li>
                    </ul>
                </li>
            @endif

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tags"></i> <span>{{__('commonmodule::sidebar.widgets')}}</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                @if(in_array('slider_app',$activeApps))
                    <!-- Slider -->
                        <li><a href="{{ url('admin-panel/widgets/slider') }}"><i
                                    class="fa fa-circle-o"></i> {{__('commonmodule::sidebar.slider')}}</a>
                        </li>
                @endif

                @if(in_array('slider_app',$activeApps))
                    <!-- acheive -->
                        <li><a href="{{ url('admin-panel/widgets/acheive') }}"><i
                                    class="fa fa-circle-o"></i> {{__('commonmodule::sidebar.acheive')}}</a>
                        </li>
                @endif
                @if(in_array('bookings_app',$activeApps))

                    <!-- Booking -->
                        <li><a href="{{ url('admin-panel/widgets/booking') }}"><i
                                    class="fa fa-circle-o"></i> {{__('widgetsmodule::widgets.bookingpagetitle')}}
                            </a>
                        </li>
                @endif
                @if(in_array('partner_app',$activeApps))

                    <!-- Partner -->
                        <li><a href="{{ url('admin-panel/widgets/partners') }}"><i
                                    class="fa fa-circle-o"></i> {{__('commonmodule::sidebar.partner')}}</a></li>
                @endif
                @if(in_array('testimonial_app',$activeApps))

                    <!-- Testimonial -->
                        <li><a href="{{ url('admin-panel/widgets/testimonials') }}"><i
                                    class="fa fa-circle-o"></i> {{__('commonmodule::sidebar.monial')}}</a></li>
                @endif
                @if(in_array('team_app',$activeApps))

                    <!-- Team -->
                        <li><a href="{{ url('admin-panel/widgets/team') }}"><i
                                    class="fa fa-circle-o"></i> {{__('commonmodule::sidebar.team')}}</a></li>
                @endif
                @if(in_array('contactus_app',$activeApps))

                    <!-- contact -->
                        <li><a href="{{url('admin-panel/widgets/contact_us')}}"><i
                                    class="fa fa-circle-o"></i> {{__('commonmodule::sidebar.contact')}}</a></li>
                @endif
                {{--                @if(in_array('why_us_app',$activeApps))--}}

                <!-- contact -->
                    <li><a href="{{url('admin-panel/widgets/why_us')}}"><i
                                class="fa fa-circle-o"></i> {{__('commonmodule::sidebar.why_us')}}</a>
                    </li>
                {{--                @endif--}}
                @if(in_array('subscribe_app',$activeApps))

                    <!-- subscribe -->
                        <li><a href="{{url('admin-panel/widgets/subscripe')}}"><i
                                    class="fa fa-circle-o"></i> {{__('commonmodule::sidebar.subs')}}</a></li>
                @endif
                @if(in_array('pages_app',$activeApps))

                    <!-- pages -->
                        <li><a href="{{url('admin-panel/widgets/page')}}"><i
                                    class="fa fa-circle-o"></i> {{__('commonmodule::sidebar.pages')}}</a></li>
                @endif
                @if(in_array('workhours_app',$activeApps))

                    <!-- work hours -->
                        <li><a href="{{url('admin-panel/widgets/hours')}}"><i
                                    class="fa fa-circle-o"></i> {{__('commonmodule::sidebar.hours')}}</a></li>
                    @endif
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-globe" aria-hidden="true"></i> <span>{{__('commonmodule::sidebar.area')}}</span>
                    <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <!-- Government -->
                    <li><a href="{{ url('admin-panel/government') }}"><i
                                class="fa fa-circle-o"></i> {{__('commonmodule::sidebar.government')}}</a></li>

                    <!-- city -->
                    <li><a href="{{ url('admin-panel/city') }}"><i
                                class="fa fa-circle-o"></i> {{__('commonmodule::sidebar.city')}}</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    <span>{{__('commonmodule::sidebar.config')}}</span>
                    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
    </span>
                </a>
                <ul class="treeview-menu">
                    @foreach($config_categs as $categ)
                        <li><a href="{{ route('showconfig',$categ->id) }}"><i
                                    class="fa fa-circle-o"></i> {{ $categ->title}}</a>
                        </li>
                    @endforeach

                </ul>
            </li>

            @role('admin|superadmin|owner')
        <!-- <li>
                <a href="{{ url('admin-panel/config-module') }}">
                    <i class="fa fa-cog" aria-hidden="true"></i><span>{{__('commonmodule::sidebar.config')}} </span>
                    <span class="pull-right-container">
                </span>
                </a>
            </li> -->
            @endrole

            @role('superadmin|owner')
            <li>
                <a href="{{ url('admin-panel/admins') }}">
                    <i class="fa fa-user" aria-hidden="true"></i><span>{{__('commonmodule::sidebar.admins')}} </span>
                    <span class="pull-right-container">
                </span>
                </a>
            </li>
            @endrole

            @role('owner')
            <li>
                <a href="{{ url('/admin-panel/commonmodule/activate-lang') }}">
                    <i class="fa fa-language" aria-hidden="true">
                    </i>
                    <span>
                        {{__('commonmodule::sidebar.langs')}}
                    </span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            @endrole

            @role('owner')
            <li>
                <a href="{{ url('admin-panel/commonmodule/settings/apps') }}">
                    <i class="fa fa-window-restore" aria-hidden="true"></i>
                    </i>
                    <span>
                        {{__('commonmodule::sidebar.apps')}}
                    </span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            @endrole
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
