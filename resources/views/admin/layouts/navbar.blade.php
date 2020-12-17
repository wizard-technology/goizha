<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">


            <div class="logo">

                <a href="/" class="logo">
                    {{-- <img src="{{asset("assets/images/logo-sm.png")}}" alt="" class="logo-small">
                    <img src="{{asset("assets/images/logo.png")}}" alt="" class="logo-large"> --}}
                </a>

            </div>


            <div class="menu-extras topbar-custom">

                <ul class="list-inline float-right mb-0 ">


                    <li class="list-inline-item dropdown notification-list">
                        <div class="dropdown notification-list nav-pro-img">
                            <a class="dropdown-toggle nav-link arrow-none waves-effect waves-light nav-user"
                                data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                aria-expanded="false">
                                <img src="{{asset("assets/images/users/avatar-10.jpg")}}" alt="user"
                                    class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                {{-- 
                                <div class="dropdown-item noti-title">
                                    <h5>Welcome</h5>
                                </div>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5"></i>
                                    Profile</a>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-wallet m-r-5"></i> My Wallet</a>
                                <a class="dropdown-item d-block" href="#"><span
                                        class="badge badge-success float-right">5</span><i
                                        class="mdi mdi-settings m-r-5"></i> Settings</a>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline m-r-5"></i> Lock
                                    screen</a>
                                <div class="dropdown-divider"></div> --}}
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i
                                        class="mdi mdi-power text-danger"></i>دەرچوون</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item list-inline-item">

                        <a class="navbar-toggle nav-link" id="mobileToggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>

                    </li>
                </ul>
            </div>


            <div class="clearfix"></div>

        </div>
    </div>



    <div class="navbar-custom">
        <div class="container-fluid">
            <div id="navigation">

                <ul class="navigation-menu" style="list-style-type:arabic-indic; text-align: right">



                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-printer"></i>پرینتکردنەکان</a>
                        <ul class="submenu megamenu">
                            <li class="">
                                <ul>
                                    <li><a href="{{route('print.index')}}">کارت</a></li>
                                    <li><a href="{{route('print.kartsheet')}}">پرنتی نمرەکان</a></li>
                                    <li><a href="{{route('degree.create')}}">مینی شیت</a></li>
                                    <li><a href="{{route('degree.create')}}">ماستەر شیت</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-archive"></i>نمرەکان</a>
                        <ul class="submenu megamenu">
                            <li class="">
                                <ul>
                                    <li><a href="{{route('degree.index')}}">نمرەی خوێنکارەکان</a></li>
                                    <li><a href="{{route('degree.create')}}">داغڵکردنی نمرە</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-message-text"></i>تێبینیەکان</a>
                        <ul class="submenu megamenu">
                            <li class="">
                                <ul>
                                    <li><a href="{{route('report.index')}}">تێبینیەکان</a></li>
                                    <li><a href="{{route('report.create')}}">زیادکردنی تێبینی</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-account-card-details"></i>خوێنکارەکان</a>
                        <ul class="submenu megamenu">
                            <li class="">
                                <ul>
                                    <li><a href="{{route('student.index')}}">خوێنکارەکان</a></li>
                                    <li><a href="{{route('student.create')}}">زیادکردن</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-clipboard-check"></i>ساڵی ئەکادیمی</a>
                        <ul class="submenu megamenu">
                            <li class="">
                                <ul>
                                    <li><a href="{{route('year.index')}}">ساڵی ئەکادیمی</a></li>
                                    <li><a href="{{route('year.create')}}">زیادکردن</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-book-multiple"></i>وانەکان</a>
                        <ul class="submenu megamenu">
                            <li class="">
                                <ul>
                                    <li><a href="{{route('courses.index')}}">وانەکان</a></li>
                                    <li><a href="{{route('courses.create')}}">زیادکردن</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-flask-empty"></i>بەشەکان</a>
                        <ul class="submenu megamenu">
                            <li class="">
                                <ul>
                                    <li><a href="{{route('department.index')}}">بەشەکان</a></li>
                                    <li><a href="{{route('department.create')}}">زیادکردن</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-account-multiple"></i>ستافی تاقیکردنەوەکان</a>
                        <ul class="submenu megamenu">
                            <li class="">
                                <ul>
                                    <li><a href="{{route('staff.index')}}">ستافی تاقیکردنەوەکان</a></li>
                                    <li><a href="{{route('staff.create')}}">زیادکردن</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="/"><i class="mdi mdi-view-dashboard"></i>سەرەکی</a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</header>