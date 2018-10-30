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
								<a  href="{{aurl('building')}}"
										class="btn btn-circle btn-icon-only btn-default"
										tooltip="{{trans('admin.show_all')}}"
										title="{{trans('admin.show_all')}}">
										<i class="fa fa-list"></i>
								</a>
								<a class="btn btn-circle btn-icon-only btn-default fullscreen"
										href="#"
										data-original-title="{{trans('admin.fullscreen')}}"
										title="{{trans('admin.fullscreen')}}">
								</a>
						</div>
				</div>
				<div class="portlet-body form">
				    <div class="col-md-12">
								
{!! Form::open(['url'=>aurl('/building'),'id'=>'building','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
    {!! Form::label('ad_title','عنوان الإعلان') !!}<br>
    <div class="col-md-9">
        {!! Form::text('ad_title',old('ad_title'),['class'=>'form-control','placeholder'=>'عنوان الإعلان']) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('ad_description','وصف  الإعلان',['class' => 'control-label']) !!}<br>
    <div class="col-md-9">
        {!! Form::textarea('ad_description',old('ad_description'),['class'=>'form-control','placeholder'=>'وصف الإعلان']) !!}
    </div>
</div>
<br>
<div class="form-group col-md-4">
    <label>المدينة</label><br>
    <select name="ad_town">
        @foreach(towns() as $key => $val)
        <option value="{{$key}}">{{$val}}</option>
        @endforeach
    </select>
</div>
<br>
<div class="form-group col-md-4">
        <label>النوع</label><br>
        <select name="ad_sort">
            @foreach(sorts() as $key => $val)
            <option value="{{$key}}">{{$val}}</option>
            @endforeach
        </select>   
</div>
<br>
<div class="form-group col-md-4">
    <label>حالة الشقة</label><br>
    <select name="ad_status">
        @foreach(statuses() as $key => $val)
        <option value="{{$key}}">{{$val}}</option>
        @endforeach 
    </select>
</div>
<br>

<div class="form-group">
    {!! Form::label('ad_main_photo','الصورة الرئيسية للشقة',['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('ad_main_photo',['class'=>'form-control','placeholder'=>'الصورة الرئيسية للشقة']) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('ad_other_photo','صور أخرى للشقة',['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('ad_other_photo',['class'=>'form-control','placeholder'=>'صور أخرى للشقة']) !!}
    </div>
</div>
<br>
<div class='form-group'>
    <div class='col-md-2'></div>
    <div class='col-md-2'>
        <select name="ad_room_count" class='form-control'>
            <option selected="">عدد الغرف</option>
            <option value='1'>1</option>
            <option value='2' >2</option>
            <option value='3'>3</option>
            <option value='4'>4</option>
            <option value='5'>5</option>
            <option value='6'>6</option>
            <option value='7'>7</option>
            <option value='8'>8</option>
            <option value='9'>9</option>
            <option value='10'>10</option>
        </select>
    </div>

    <div class='col-md-2'>
         <select name="ad_bathroom_count" class='form-control'>
            <option selected="">عدد الحمامات</option>
            <option value='1'>1</option>
            <option value='2' >2</option>
            <option value='3'>3</option>
            <option value='4'>4</option>
            <option value='5'>5</option>
            <option value='6'>6</option>
            <option value='7'>7</option>
            <option value='8'>8</option>
            <option value='9'>9</option>
            <option value='10'>10</option>
        </select>
    </div>

    <div class='col-md-2'>
         <select name="ad_kitchen_count" class='form-control'>
            <option selected>عدد المطبخ</option>
            <option value='1'>1</option>
            <option value='2' >2</option>
            <option value='3'>3</option>
            <option value='4'>4</option>
            <option value='5'>5</option>
            <option value='6'>6</option>
            <option value='7'>7</option>
            <option value='8'>8</option>
            <option value='9'>9</option>
            <option value='10'>10</option>
        </select>
    </div>

    <div class='col-md-2'>
         <select name="ad_reseption_count" class='form-control'>
            <option selected="">الريسبشن</option>
            <option value='1'>1</option>
            <option value='2' >2</option>
            <option value='3'>3</option>
            <option value='4'>4</option>
            <option value='5'>5</option>
            <option value='6'>6</option>
            <option value='7'>7</option>
            <option value='8'>8</option>
            <option value='9'>9</option>
            <option value='10'>10</option>
        </select>
    </div>

    <div class='col-md-2'></div>
</div>
<br>
<div class="form-group">
    {!! Form::label('ad_space','المساحة', ['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-6">
        <input type='number' name='ad_space' class='form-control' min="30" value="{{old('ad_space')}}">
    </div>
    <div class='col-md-3'>
        <select>
            <option selected="">جنية مصرى</option>
        </select>
    </div>
</div>


<br>
<div class="form-group">
    {!! Form::label('ad_price',trans('admin.ad_price'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('ad_price',old('ad_price'),['class'=>'form-control','placeholder'=>trans('admin.ad_price'), 'min' => '0']) !!}
    </div>
    <div class='col-md-3'>
        <select>
            <option selected>جنيه مصرى</option>
        </select>
    </div>
</div>
<br>

<div class="form-group">
    {!! Form::label('ad_owner_phone',trans('admin.ad_owner_phone'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('ad_owner_phone',old('ad_owner_phone'),['class'=>'form-control','placeholder'=>trans('admin.ad_owner_phone')]) !!}
    </div>
</div>

<br>

<div class="form-group">
    {!! Form::label('ad_keywords',trans('admin.ad_keywords'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('ad_keywords',old('ad_keywords'),['class'=>'form-control','placeholder'=>trans('admin.ad_keywords')]) !!}
    </div>
</div>
<br>

<div class='form-group'>
    <label for="furnished">مفروشة ؟ </label> <input type="checkbox" name="furnished">
</div>
<br>
<div class="form-actions">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
{!! Form::submit(trans('admin.add'),['class'=>'btn btn-success']) !!}
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
	
