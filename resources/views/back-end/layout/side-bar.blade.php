<div class="sidebar" role="navigation">
    <div class="navbar-collapse">
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right dev-page-sidebar mCustomScrollbar _mCS_1 mCS-autoHide mCS_no_scrollbar" id="cbp-spmenu-s1">
            <div class="scrollbar scrollbar1">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="/admin/dashboard"><i class="fa fa-home nav_icon"></i>الرئيسية</a>
                    </li>
                    <li>
                        <a href="{{route('exports.create')}}"><i class="fa fa-location-arrow nav_icon"></i>أرشيف الصادر </a>
                    </li>
                    <li>
                        <a href="{{route('imports.index')}}"><i class="fa fa-location-arrow nav_icon"></i>أرشيف الوارد</a>
                    </li>
                    <li>
                        <a href="{{route('generals.index')}}"><i class="fa fa-location-arrow nav_icon"></i>الأرشيف العام</a>
                    </li>
                    <li>
                        <a href="activ&products.html"><i class="fa fa-location-arrow nav_icon"></i>أرشيف الفعاليات والمنتجات</a>
                    </li>
                    <li>
                        <a href="{{route('albums.index')}}"><i class="fa fa-location-arrow nav_icon"></i>أرشيف الصور</a>
                    </li>
                    <li>
                        <a href="{{route('videos.index')}}"><i class="fa fa-location-arrow nav_icon"></i>أرشيف الفيديو</a>
                    </li>
                    <li>
                        <a href="{{route('forms.index')}}"><i class="fa fa-location-arrow nav_icon"></i>أرشيف النماذج</a>
                    </li>
                    <li>
                        <a href="business.html"><i class="fa fa-location-arrow nav_icon"></i>أرشيف العقود والشؤون المالية</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-location-arrow nav_icon"></i>بيانات العملاء</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-location-arrow nav_icon"></i> بيانات المدارس </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-location-arrow nav_icon"></i>التقارير</a>
                    </li>

                    <li>
                        <a href="{{route('reminders.index')}}"><i class="fa fa-location-arrow nav_icon"></i>التذكيرات العامة</a>
                    </li>
                    <li>
                        <a href="public_serch.html"><i class="fa fa-location-arrow nav_icon"></i>البحث </a>
                    </li>
                    <li>
                        <a href="contact_direction.html"><i class="fa fa-location-arrow nav_icon"></i> جهات الاتصال</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-location-arrow nav_icon"></i>الإعدادات</a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="{{route('categories.index')}}"><i class="fa fa-list nav_icon"></i>التصنيفات</a>
                            </li>
                            <li>
                                <a href="{{route('adminstrations.index')}}"><i class="fa fa-list nav_icon"></i>الإدارات</a>
                            </li>
                            <li>
                                <a href="{{route('users.index')}}"><i class="fa fa-list nav_icon"></i>المستخدمين</a>
                            </li>
                        </ul>
                    </li>
        </ul>
            </div>
            <!-- //sidebar-collapse -->
        </nav>
    </div>
</div>
<!--left-fixed -navigation-->
<!-- header-starts -->
<div class="sticky-header header-section ">
    <br />  
    <div class="row" style="margin: 0;padding: 0;">
        <div class="col-md-2">

            <div class="col-md-5" style="float:right; margin-top: -21px;">
                <button id="showLeftPush"><i class="fa fa-bars" ></i></button>
            </div>

            <div class="col-md-7">
                <ul>
                    <li class="dropdown profile_details_drop">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <div class="profile_img">
                                <span class="prfil-img" ><img src="/assets/images/a.png" alt="" style="margin-top: -21px;margin-left: 30px !important;"> </span>
                                <!--<p class="smallfont"> Welcome <span>Bassem Darwish</span></p>-->
                            </div>
                        </a>
                        <ul class="dropdown-menu drp-mnu">
                            <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li>
                            <li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li>
                            <li> 
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

            <div class="col-md-1" style="border-left: 10px solid #007171;">
                <img src="/assets/images/logoN.png" style="height: 60px; " />
            </div>

            <div class="col-md-2" style="text-align:center;    ">
                <h1>
                    {{$pageTitle}}
                </h1>
            </div>

            <div class="col-md-7" style="background-image: url(/assets/images/banerETop.png);background-repeat: repeat-x;background-size: contain;    height: 66px;">
             
            </div>

        </div>







<div class="clearfix"> </div>
</div>
