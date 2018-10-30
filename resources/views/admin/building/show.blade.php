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
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('building/create')}}"
                           data-toggle="tooltip" title="{{trans('admin.building')}}">
                            <i class="fa fa-plus"></i>
                        </a>


                        <span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.building')}}">

                        <a data-toggle="modal" data-target="#myModal{{$building->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
                        <i class="fa fa-trash"></i>
                        </a>
                        </span>


<div class="modal fade" id="myModal{{$building->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">x</button>
                <h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
            </div>
  
            <div class="modal-footer">
                {!! Form::open([
               'method' => 'DELETE',
               'route' => ['building.destroy', $building->id]
               ]) !!}
                {!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
                <a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('/building')}}"
                           data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.building')}}">
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
<b>{{trans('admin.id')}} :</b> {{$building->id}}
</div>
<div class="clearfix"></div>
<hr />

<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.ad_name')}} :</b>
 {!! $building->ad_name !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.ad_type')}} :</b>
 {!! $building->ad_type !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.ad_description')}} :</b>
 {!! $building->ad_description !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.ad_main_photo')}} :</b>
 {!! $building->ad_main_photo !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.ad_other_photo')}} :</b>
 {!! $building->ad_other_photo !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.ad_owner')}} :</b>
 {!! $building->ad_owner !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.ad_town')}} :</b>
 {!! $building->ad_town !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.ad_owner_phone')}} :</b>
 {!! $building->ad_owner_phone !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.ad_price')}} :</b>
 {!! $building->ad_price !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.ad_sort')}} :</b>
 {!! $building->ad_sort !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.ad_keywords')}} :</b>
 {!! $building->ad_keywords !!}
</div>

			</div>
			<div class="clearfix"></div>
           </div>
         </div>
       </div>
   </div>

   <div class='activation'>
            <a href="{{aurl('flat/'.$building->id.'/activation')}}" class='btn btn-primary'>
              {{$building->active == '0' ? 'تفعيل' : 'إلغاء التفعيل'}} 
            </a>
        </div>
@stop