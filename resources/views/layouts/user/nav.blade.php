<div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <!-- Body content -->




        <nav class="navbar navbar-default ">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{url('')}}">
                        @if(!empty(setting()->site_logo))
                            <img width="50" height="60" src="{{it()->url(setting()->site_logo)}}" /></a>
                        @else
                            <img width="50" height="60" src="{{url('design/frontend/assets/spearImg/logo.png')}}" /></a>
                        @endif
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse yamm" id="navigation">

                    @if(auth()->guard('web')->user())
                    <div class="button navbar-left">
                        <button class="navbar-btn nav-button login" onclick=" window.open('{{url('new')}}', '_self')" data-wow-delay="0.5s">اضف إعلان</button>
                        <li class="dropdown ymm-sw myProfile" data-wow-delay="0.1s">
                            <a href="index.html" class="dropdown-toggle active" data-toggle="dropdown" data-hover="dropdown" data-delay="200">
                                @if(!empty(auth()->user()->photo))
                                <img class="img img-responsive img-circle" style="display: inline" width="50" height="50" src="{{it()->url(auth()->user()->photo)}}" />
                                @else

                                {{auth()->user()->name}}

                                @endif

                                <b class="caret"></b></a>
                            <ul class="dropdown-menu navbar-nav">
                                <li>
                                    <a href="{{url('profile/ads')}}">إعلاناتى
                                    </a>
                                </li>

                                <li>
                                    <a href="{{url('profile')}}">إعدادات الحساب
                                    </a>
                                </li>
        
                                <li>
                                    <a href="{{url('logout')}}">تسجيل الخروج</a>
                                </li>

                            </ul>
                        </li>
                        
                        
                    </div>


                    @else 

                    <div class="button navbar-left">
                        <button class="navbar-btn nav-button add_ad_btn" onclick=" window.open('{{url('new')}}', '_self')" data-wow-delay="0.4s">أضف إعلان <i class='fa fa-plus'></i></button>

                        <button class="navbar-btn nav-button login" onclick=" window.open('{{url('login')}}', '_self')" data-wow-delay="0.4s">دخول <i class='fa fa-sign-in'></i></button>
                        <button class="navbar-btn nav-button" onclick=" window.open('{{url('register')}}', '_self')" data-wow-delay="0.5s">التسجيل <i class='fa fa-user-plus'></i></button>
                    </div>


                    @endif

                    

                    <ul class="main-nav nav navbar-nav navbar-right">
                        
                        <li class="wow zoomIn {{setActive('home', '', 'active')}}" data-wow-delay="0.2s"><a class="" href="{{url('home')}}">شقــــق</a></li>
                        <li class="wow zoomIn {{setActive('flats', 'rent', 'active')}}" data-wow-delay="0.2s"><a class="" href="{{url('flats/rent')}}">شقق للإيجار</a></li>
                        <li class="wow zoomIn {{setActive('flats', 'ownership', 'active')}}" data-wow-delay="0.2s"><a class="" href="{{url('flats/ownership')}}">شقـق للتمليك</a></li>
                        <li class="wow zoomIn {{setActive('contact', '', 'active')}}" data-wow-delay="0.5s"><a href="{{url('contact')}}">تواصل معنا</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->


            </div><!-- /.container-fluid -->


        </nav>
        <!-- End of nav bar -->

@yield('header-content')