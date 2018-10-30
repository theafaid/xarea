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
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('user/create')}}"
                           data-toggle="tooltip" title="{{trans('admin.user')}}">
                            <i class="fa fa-plus"></i>
                        </a>


                        <span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.user')}}">

                        <a data-toggle="modal" data-target="#myModal{{$user->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
                        <i class="fa fa-trash"></i>
                        </a>
                        </span>


<div class="modal fade" id="myModal{{$user->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">x</button>
                <h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
            </div>
            <div class="modal-body">
                                {{trans('admin.ask_del')}} {{trans('admin.id')}} {{$user->id}} ؟

            </div>
            <div class="modal-footer">
                {!! Form::open([
               'method' => 'DELETE',
               'route' => ['user.destroy', $user->id]
               ]) !!}
                {!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
                <a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('/user')}}"
                           data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.user')}}">
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
<b>{{trans('admin.id')}} :</b> {{$user->id}}
</div>
<div class="clearfix"></div>
<hr />


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.name')}} :</b>
 {!! $user->name !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.email')}} :</b>
 {!! $user->email !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.password')}} :</b>
 {!! $user->password !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.password_confirmation')}} :</b>
 {!! $user->password_confirmation !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.photo')}} :</b>
 <img src="{{it()->url($user->photo)}}" width="150" height="200" />
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.phone')}} :</b>
 {!! $user->phone !!}
</div>

			</div>
			<div class="clearfix"></div>
           </div>
         </div>
       </div>
   </div>
@stop