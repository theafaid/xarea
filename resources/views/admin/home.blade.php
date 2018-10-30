@extends('admin.index')
@section('content')
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <div class="number">
                    <h3 class="font-green-sharp">
                    <a href="{{aurl('user')}}"><span data-counter="counterup" data-value="7800">{{$usersCount}}</span></a>
                    </h3>
                    <small> الأعضاء</small>
                </div>

                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
            </div>
            
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <div class="number">
                    <h3 class="font-red-haze">
                    <a href="{{aurl('building')}}"><span data-counter="counterup" data-value="1349">{{$adsCount}}</span></a>
                    </h3>
                    <small>الإعلانات</small>
                </div>
                <div class="icon">
                    <i class="fa fa-home"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <div class="number">
                    <h3 class="font-red-haze">
                    <a href="{{aurl('building-active')}}"><span data-counter="counterup" data-value="1349">{{$activeAds}}</span></a>
                    </h3>
                    <small>الإعلانات المفعلة</small>
                </div>
                <div class="icon">
                    <i class="fa fa-home"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <div class="number">
                    <h3 class="font-red-haze">
                    <a href="{{aurl('building-inactive')}}"><span data-counter="counterup" data-value="1349">{{$inactiveAds}}</span>
                    </h3>
                    <small>الإعلانات غير المفعلة</small>
                </div>
                <div class="icon">
                    <i class="fa fa-home"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <div class="number">
                    <h3 class="font-red-haze">
                    <a href="{{aurl('message')}}"><span data-counter="counterup" data-value="1349">{{messages('countAll')}}</span></a>
                    </h3>
                    <small>الرسائل</small>
                </div>
                <div class="icon">
                    <i class="fa fa-comments"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <div class="number">
                    <h3 class="font-red-haze">
                    <a href="{{aurl('message-unwatched')}}"><span data-counter="counterup" data-value="1349">{{messages('countInactive')}}</span></a>
                    </h3>
                    <small>الرسائل الغير مقروؤة</small>
                </div>
                <div class="icon">
                    <i class="fa fa-comments"></i>
                </div>
            </div>
        </div>
    </div>

     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <div class="number">
                    <h3 class="font-red-haze">
                    <span data-counter="counterup" data-value="1349">{{$online}}</span>
                    </h3>
                    <small>أونلاين الآن</small>
                </div>
                <div class="icon">
                    <label class='label label-success'>O</label>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <div class="number">
                    <h3 class="font-red-haze">
                    <span data-counter="counterup" data-value="1349">100</span>
                    </h3>
                    <small>ترتيب الموقع</small>
                </div>
                <div class="icon">
                    <i class="fa fa-building"></i>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase font-dark">{{trans('admin.dashboard')}}</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div id="dashboard_amchart_1" class="CSSAnimationChart">
                    <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN CHART PORTLET-->
                                <div class="portlet light">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-bar-chart font-green-haze"></i>
                                            <span class="caption-subject bold uppercase font-green-haze"> Bar Charts</span>
                                            <span class="caption-helper">column and line mix</span>
                                        </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse">
                                            </a>
                                            <a href="#portlet-config" data-toggle="modal" class="config">
                                            </a>
                                            <a href="javascript:;" class="reload">
                                            </a>
                                            <a href="javascript:;" class="fullscreen">
                                            </a>
                                            <a href="javascript:;" class="remove">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div id="chart_1" class="chart" style="height: 500px;">
                                        </div>
                                    </div>
                                </div>
                                <!-- END CHART PORTLET-->
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE BASE CONTENT -->
@endsection