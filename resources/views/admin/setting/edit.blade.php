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
										
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('setting')}}"
												data-toggle="tooltip" title="{{trans('{lang}.show_all')}}   {{trans('{lang}.setting')}}">
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
										
{!! Form::open(['url'=>aurl('/setting/'.setting()->id),'method'=>'POST','id'=>'setting','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}

<input type="hidden" name="_method" value="PUT">
<div class="form-group">
    {!! Form::label('sitename','إسم الموقع',['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('sitename', setting()->sitename ,['class'=>'form-control','placeholder'=> 'إسم الموقع']) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('site_description','وصف الموقع لمحركات البحث',['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('site_description', setting()->site_description,['class'=>'form-control','placeholder'=>'اوصف موقعك لمحركات البحث فيما لايزيد عن 161 حرف ..']) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('site_header_text','العنوان الرئيسي ',['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('site_header_text', setting()->site_header_text ,['class'=>'form-control','placeholder'=>'العنوان الرئيسي فى الصفحة الرئيسية']) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('site_header_description','الوصف الرئيسي',['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('site_header_description', setting()->site_header_description,['class'=>'form-control','placeholder'=>'الوصف الرئيسي فى الصفحة الرئيسية']) !!}
    </div>
</div>
<br>

<div class="form-group">
    {!! Form::label('site_logo','شعار الموقع',['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('site_logo',['class'=>'form-control']) !!}
        @if(!empty(setting()->site_logo))
        <img src="{{it()->url(setting()->site_logo)}}" style="width:150px;height:150px;" />
        @endif
    </div>
</div>
<br>

<div class="form-group">
    {!! Form::label('site_header_background','خلفية مقدمة الصفحة الرئيسية',['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('site_header_background',['class'=>'form-control']) !!}
        @if(!empty(setting()->site_header_background))
        <img src="{{it()->url(setting()->site_header_background)}}" style="width:150px;height:150px;" />
        @endif
    </div>
</div>
<br>

<div class="form-group">
    {!! Form::label('site_status','حالة الموقع',['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        <select name="site_status">
        	<option value="on" @if(setting()->site_status == 'on') selected @endif>مفتوح</option>
        	<option value="off" @if(setting()->site_sttus == 'off') selected @endif>مغلق</option>
        </select>
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('maintenence_message','رسالة الصيانة',['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('maintenence_message', setting()->maintenence_message ,['class'=>'form-control','placeholder'=>'فى حالة  غلق الموقع للصيانة .. اكتب رسالة للمستخدم عند الدخول الى موقعك فى هذه الفترة']) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('keywords',trans('admin.keywords'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {{Form::text('keywords', setting()->keywords, ['class' => 'form-control', 'placeholder' => trans('admin.keywords')])}}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('site_email','البريد الإلكترونى',['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {{Form::text('site_email', setting()->site_email, ['class' => 'form-control', 'placeholder' =>'البريد الإلكترونى الخاص بالموقع'])}}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('site_facebook', 'رابط فيسبوك' ,['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {{Form::text('site_facebook', setting()->site_facebook, ['class' => 'form-control', 'placeholder' => 'رابط صفحة موقعك على الفيسبوك .. اكتب الرابط كاملا'])}}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('site_twitter','رابط تويتر',['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {{Form::text('site_twitter', setting()->site_twitter, ['class' => 'form-control', 'placeholder' =>'رابط حساب تويتر الخاص بموقعك .. اكتب الرابط كاملا'])}}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('site_googleplus','رابط جوجل بلس',['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {{Form::text('site_googleplus', setting()->site_googleplus, ['class' => 'form-control', 'placeholder' =>'رابط حساب جوجل بلس الخاص بموقعك .. اكتب الرابط كامل'])}}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('site_phone','رقم الهاتف',['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {{Form::text('site_phone', setting()->site_phone, ['class' => 'form-control', 'placeholder' =>'رقم الهاتف الخاص بموقعك'])}}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('site_address','عنوان موقعك',['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {{Form::textarea('site_address', setting()->site_address, ['class' => 'form-control', 'placeholder' =>'عنوان موقعك'])}}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('site_footer_text','رسالة حقوق النشر',['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('site_footer_text', setting()->site_footer_text ,['class'=>'form-control','placeholder'=>'رسالة حقوق النشر .. تظهر فى آخر الصفحات']) !!}
    </div>
</div>
<br>
<div class="form-actions">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
{!! Form::submit('حفظ الإعدادات',['class'=>'btn btn-success']) !!}
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
		
