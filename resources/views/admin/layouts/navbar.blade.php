<!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="{{aurl('')}}">
                    
                         @if(!empty(setting()->site_logo))
                            <img width="130" height="60" src="{{it()->url(setting()->site_logo)}}" /></a>
                        @else
                            <img width="130" height="60" src="{{url('design/frontend/assets/spearImg/logo.png')}}" /></a>
                        @endif

                        
                    </a>
                    <div class="menu-toggler sidebar-toggler">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN PAGE ACTIONS -->
                <!-- DOC: Remove "hide" class to enable the page header actions -->

                <!-- END PAGE ACTIONS -->
                <!-- BEGIN PAGE TOP -->
                <div class="page-top">
                    <!-- BEGIN HEADER SEARCH BOX -->
                    <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                    <form class="search-form" action="page_general_search_2.html" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control input-sm" placeholder="Search..." name="query">
                            <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit">
                                    <i class="fa fa-search"></i>
                                </a>
                            </span>
                        </div>
                    </form>
                    <!-- END HEADER SEARCH BOX -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">

                        <ul class="nav navbar-nav pull-right">
                            <li class="separator hide"> </li>

<li class="dropdown dropdown-extended dropdown-notification" id="cog_list">
    <a href="javascript:;"  class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
        <i class="fa fa-paint-brush"></i>
    </a>
    <ul class="dropdown-menu">
        <li>
            <a href="javascript:;" onclick="change_theme('1')">
            <i class="fa fa-paint-brush"></i> {{trans('admin.theme1')}} </a>
        </li>
        <li>
            <a href="javascript:;" onclick="change_theme('2')">
            <i class="fa fa-paint-brush"></i> {{trans('admin.theme2')}} </a>
        </li>
        <li>
            <a href="javascript:;" onclick="change_theme('3')">
            <i class="fa fa-paint-brush"></i> {{trans('admin.theme3')}} </a>
        </li>
    </ul>
</li>

                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="fa fa-bell"></i>
                                    <span class="badge badge-success">{{notifications('count')}}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>
                                            <span class="bold"> لديك {{notifications('count')}} </span> إشعار </h3>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                            @foreach(notifications() as $note)
                                                <li>
                                                    <a href="{{aurl('building/' . $note->id)}}">
                                                        <span class="time">{{date('M/d h:i', strtotime($note->created_at))}}</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-success">
                                                                <i class="fa fa-plus"></i>
                                                            </span>{{str_limit($note->ad_title, 15) . " ( فى إنتظار التفعيل ) "}}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                           
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- END NOTIFICATION DROPDOWN -->
                            <li class="separator hide"> </li>
                            <!-- BEGIN INBOX DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="fa fa-envelope"></i>
                                    <span class="badge badge-danger">{{messages('countInactive')}}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>لديك
                                            <span class="bold">{{messages('countInactive')}}  رسائل</span> جديدة</h3>
                                        <a href="{{aurl('message')}}">مشاهدة الكل</a>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                            @foreach(messages('inactive') as $msg)
                                             <li>
                                                <a href="{{aurl('message/'.$msg->id)}}">
                                                    <span class="photo">
                                                        <img src="" class="img-circle" alt=""> </span>
                                                    <span class="subject">
                                                        <span class="from">{{$msg->name}}</span>
                                                        <span class="time">{{$msg->created_at}}</span>
                                                    </span>
                                                    <span class="message"> 
                                                        {{str_limit($msg->message, 20)}}
                                                    </span>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                </ul>
                            </li>

                            <!-- END INBOX DROPDOWN -->
                            <li class="separator hide"> </li>
                            <!-- BEGIN   DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the =
                            <!-->
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user dropdown-dark">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <span class="username username-hide-on-mobile"> {{ admin()->user()->name }} </span>
                                    <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                                    @if(!empty(admin()->user()->photo))
                                    <img alt="" class="img-circle" src="{{it()->url(admin()->user()->photo)}}" /> </a>
                                    @else
                                    <img alt="" class="img-circle" src="{{url('design/admin_panel')}}/assets/spearImg/avatar.png" /> </a>
                                    @endif
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="{{aurl('profile')}}">
                                            <i class="fa fa-user"></i>الحساب الشخصى</a>
                                    </li>
                                    <li>
                                        <a href="{{aurl('admin/create')}}">
                                            <i class="fa fa-plus"></i>إضافة مشرف</a>
                                    </li>
                                    <li>
                                        <a href="{{aurl('user/create')}}">
                                            <i class="fa fa-user-plus"></i>إضافة عضو
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{aurl('building/create')}}">
                                            <i class="fa fa-home"></i> إضافة إعلان
                                        </a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="{{ aurl('logout') }}">
                                            <i class="fa fa-key"></i>تسجيل الخروج</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            
                        </ul>

                    </div>

                    <!-- END TOP NAVIGATION MENU -->
                </div>
                                <div class="clearfix"> </div>
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->

        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
<!-- BEGIN SIDEBAR -->
<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
<div class="page-sidebar navbar-collapse collapse">


    <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

        