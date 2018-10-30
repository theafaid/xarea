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
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('admin/create')}}"
												data-toggle="tooltip" title="{{trans('{lang}.add')}}  {{trans('{lang}.admin')}}">
												<i class="fa fa-plus"></i>
										</a>
										<span data-toggle="tooltip" title="{{trans('{lang}.delete')}}  {{trans('{lang}.admin')}}">
												<a data-toggle="modal" data-target="#myModal{{$admin->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
														<i class="fa fa-trash"></i>
												</a>
										</span>
										<div class="modal fade" id="myModal{{$admin->id}}">
												<div class="modal-dialog">
														<div class="modal-content">
																<div class="modal-header">
																		<button class="close" data-dismiss="modal">x</button>
																		<h4 class="modal-title">تأكيد الحذف</h4>
																</div>
																<div class="modal-body">
																		<i class="fa fa-exclamation-triangle"></i>   
																		هل انت متأكد من الحذف   
																		سيتم حذف المشرف رقم  ({{$admin->id}}) ؟
																</div>
																<div class="modal-footer">
																		{!! Form::open([
																		'method' => 'DELETE',
																		'route' => ['admin.destroy', $admin->id]
																		]) !!}
																		{!! Form::submit('موافق', ['class' => 'btn btn-danger']) !!}
																		<a class="btn btn-default" data-dismiss="modal">إلغاء</a>
																		{!! Form::close() !!}
																</div>
														</div>
												</div>
										</div>
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('admin')}}"
												data-toggle="tooltip" title="{{trans('{lang}.show_all')}}   {{trans('{lang}.admin')}}">
												<i class="fa fa-list"></i>
										</a>
										<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"
												data-original-title="{{trans('{lang}.fullscreen')}}"
												title="{{trans('{lang}.fullscreen')}}">
										</a>
								</div>
						</div>
						<div class="portlet-body form">
								<div class="col-md-12">
										
{!! Form::open(['url'=>aurl('/admin/'.$admin->id),'method'=>'put','id'=>'admin','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
    {!! Form::label('name',trans('admin.name'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('name', $admin->name ,['class'=>'form-control','placeholder'=>trans('admin.name')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('email',trans('admin.email'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::email('email', $admin->email ,['class'=>'form-control','placeholder'=>trans('admin.email')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('phone',trans('admin.phone'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('phone', $admin->phone ,['class'=>'form-control','placeholder'=>trans('admin.phone')]) !!}
    </div>
</div>
<br>
<div class="form-group">
	{!!  Form::label('photo', 'الصورة الشخصية', ['class' => 'col-md-3 control-label']) !!}
	<div class='col-md-9'>
		{!! Form::file('photo', ['class' => 'form-control']) !!}
	</div>
</div>
<br>
<div class="form-group">
    <div class="col-md-9 col-md-offset-3">
        @if(!empty($admin->photo))
        <img src="{{it()->url($admin->photo)}}" style="width:150px;height:150px;" />
        @endif
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('password',trans('admin.password'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::password('password',['class'=>'form-control','placeholder'=>trans('admin.password')]) !!}
    </div>
</div>
<br>
<div class="form-actions">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
{!! Form::submit(trans('admin.save'),['class'=>'btn btn-success']) !!}
         </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

												</div>
												<div class="clearfix"></div>
								</div>
						</div>
				</div>
		</div>
		@stop
		
