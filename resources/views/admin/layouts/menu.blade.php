<li class="nav-item start {{ active_link(null,'active open') }} ">
    <a href="{{aurl('')}}" class="nav-link nav-toggle">
        <i class="fa fa-home"></i>
        <span class="title">{{trans('admin.dashboard')}}</span>
        <span class="selected"></span>
    </a>
</li>

<!-- Admins -->
<li class="nav-item start {{active_link('admin','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa "></i>
        <span class="title">{{trans('admin.admins')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('admin','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('admin','active open')}}  "> 
            <a href="{{aurl('admin')}}" class="nav-link "> 
                <i class="fa "></i>
                <span class="title">{{trans('admin.admins')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('admin/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<!-- /Admins-->

<!-- users -->
<li class="nav-item start {{active_link('user','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa "></i>
        <span class="title">{{trans('admin.user')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('user','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('user','active open')}}  "> 
            <a href="{{aurl('user')}}" class="nav-link "> 
                <i class="fa "></i>
                <span class="title">{{trans('admin.user')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('user/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<!-- /Users -->


<!-- /Flats -->
<li class="nav-item start {{active_link('building','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa "></i>
        <span class="title">الشقق</span>
        <span class="selected"></span>
        <span class="arrow {{active_link('building','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('building','active open')}}  "> 
            <a href="{{aurl('building')}}" class="nav-link "> 
                <i class="fa "></i>
                <span class="title">الكل</span>
                <span class="selected"></span>
            </a>
        </li> 

        <li class="nav-item start {{active_link('building-active','active open')}}"> 
            <a href="{{aurl('building-active')}}" class="nav-link "> 
                <i class="fa "></i>
                <span class="title">الشقق المفعلة</span>
                <span class="selected"></span>
            </a>
        </li> 

        <li class="nav-item start {{active_link('building-inactive','active open')}}"> 
            <a href="{{aurl('building-inactive')}}" class="nav-link "> 
                <i class="fa "></i>
                <span class="title">الشقق غير المفعلة</span>
                <span class="selected"></span>
            </a>
        </li> 


        <li class="nav-item start"> 
            <a href="{{ aurl('building/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>

<!-- messages -->
<li class="nav-item start {{active_link('message','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa "></i>
        <span class="title">الرسائل</span>
        <span class="selected"></span>
        <span class="arrow {{active_link('message','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}">
        <li class="nav-item start {{active_link('message','active open')}}  "> 
            <a href="{{aurl('message')}}" class="nav-link "> 
                <i class="fa "></i>
                <span class="title">الكل</span>
                <span class="selected"></span>
            </a>
        </li> 

        <li class="nav-item start {{active_link('message-unwatched','active open')}}"> 
            <a href="{{aurl('message-unwatched')}}" class="nav-link "> 
                <i class="fa "></i>
                <span class="title">غير المقروئة</span>
                <span class="selected"></span>
            </a>
        </li> 
    </ul> 
</li>



<!-- settings -->
<li class="nav-item start {{active_link('setting','active open')}}  "> 
            <a href="{{aurl('setting')}}" class="nav-link "> 
                <i class="fa "></i>
                <span class="title">{{trans('admin.setting')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 