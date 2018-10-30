@extends('admin.index')
@section('content')

		 <div class="row">
        <div class="col-md-12">
            <div class="widget-extra body-req portlet light bordered">
              <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-dark">{{$title}}</span>
                    </div>
                    <div class="actions">
                        

                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('/setting')}}"
                           data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.setting')}}">
                            <i class="fa fa-list"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"
                           data-original-title="{{trans('admin.fullscreen')}}"
                           title="{{trans('admin.fullscreen')}}">
                        </a>
                    </div>
                </div>
            <div class="portlet-body form">
				<div class="col-md-12">
<div class="col-md-12 col-lg-12 col-xs-12">
<b>{{trans('admin.id')}} :</b> {{$setting->id}}
</div>
<div class="clearfix"></div>
<hr />



<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.sitename_ar')}} :</b>
 {!! $setting->sitename_ar !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.sitename_en')}} :</b>
 {!! $setting->sitename_en !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.site_logo')}} :</b>
 {!! $setting->site_logo !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.site_lang')}} :</b>
 {!! $setting->site_lang !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.site_status')}} :</b>
 {!! $setting->site_status !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.maintenence_message')}} :</b>
 {!! $setting->maintenence_message !!}
</div>

			</div>
			<div class="clearfix"></div>
           </div>
         </div>
       </div>
   </div>
@stop