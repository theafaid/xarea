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
												data-toggle="tooltip" title="{{trans('{lang}.add')}}  {{trans('{lang}.building')}}">
												<i class="fa fa-plus"></i>
										</a>
										<span data-toggle="tooltip" title="{{trans('{lang}.delete')}}  {{trans('{lang}.building')}}">
												<a data-toggle="modal" data-target="#myModal{{$building->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
														<i class="fa fa-trash"></i>
												</a>
										</span>
										<div class="modal fade" id="myModal{{$building->id}}">
												<div class="modal-dialog">
														<div class="modal-content">
																<div class="modal-header">
																		<button class="close" data-dismiss="modal">x</button>
																		<h4 class="modal-title">{{trans('{lang}.delete')}}؟</h4>
																</div>
																<div class="modal-body">
																		<i class="fa fa-exclamation-triangle"></i>   {{trans('{lang}.ask_del')}} {{trans('{lang}.id')}} ({{$building->id}}) ؟
																</div>
																<div class="modal-footer">
																		{!! Form::open([
																		'method' => 'DELETE',
																		'route' => ['building.destroy', $building->id]
																		]) !!}
																		{!! Form::submit(trans('{lang}.approval'), ['class' => 'btn btn-danger']) !!}
																		<a class="btn btn-default" data-dismiss="modal">{{trans('{lang}.cancel')}}</a>
																		{!! Form::close() !!}
																</div>
														</div>
												</div>
										</div>
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('building')}}"
												data-toggle="tooltip" title="{{trans('{lang}.show_all')}}   {{trans('{lang}.building')}}">
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
										
{!! Form::open(['url'=>aurl('/building/'.$building->id),'method'=>'put','id'=>'building','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
    {!! Form::label('ad_type',trans('admin.ad_type'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        <select name="ad_type">
        	<option value='شقة' selected>شقة</option>
        </select>
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('ad_description','وصف الشقة',['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('ad_description', $building->ad_description ,['class'=>'form-control','placeholder'=>'وصف الشقة']) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('ad_main_photo','الصورة الرئيسية للشقة',['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('ad_main_photo',['class'=>'form-control','placeholder'=>'الصورة الرئيسية للشقة']) !!}
        @if(!empty($building->ad_main_photo))
        <img src="{{it()->url($building->ad_main_photo)}}" style="width:150px;height:150px;" />
        @endif
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('ad_other_photo','صور أخرى للشقة',['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('ad_other_photo',['class'=>'form-control','placeholder'=>'صور أخرى للشقة']) !!}
        @if(!empty($building->ad_other_photo))
        <img src="{{it()->url($building->ad_other_photo)}}" style="width:150px;height:150px;" />
        @endif
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('ad_town',trans('admin.ad_town'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        <select class="select-custom" name='ad_town'>
<option>المنطقة/الحي</option>
<option value='6 اكتوبر'>6 اكتوبر</option>
<option value='ابو رواش'>ابو رواش</option>
<option value='اطفيح'>اطفيح</option>
<option value='البدرشين'>البدرشين</option>
<option value='البساتين'>البساتين</option>
<option value='البستان'>البستان</option>
<option value='البشاير'>البشاير</option>
<option value='الجيزة'>الجيزة</option>
<option value='الحوامدية'>الحوامدية</option>
<option value='الخليفة'>الخليفة</option>
<option value='الدقي'>الدقي</option>
<option value='الروضه'>الروضه</option>
<option value='الزاوية الحمراء'>الزاوية الحمراء</option>
<option value='الزيتون'>الزيتون</option>
<option value='الساحل'>الساحل</option>
<option value='السلام'>السلام</option>
<option value='السيدة زينب'>السيدة زينب</option>
<option value='الشرابية'>الشرابية</option>
<option value='العجوزة'>العجوزة</option>
<option value='العمرانية'>العمرانية</option>
<option value='العياط'>العياط</option>
<option value='اللشت'>اللشت</option>
<option value='المرج'>المرج</option>
<option value='المطرية'>المطرية</option>
<option value='المقطم'>المقطم</option>
<option value='المهندسين'>المهندسين</option>
<option value='الموسكي'>الموسكي</option>
<option value='النزهة'>النزهة</option>
<option value='الهرم'>الهرم</option>
<option value='الوايلي'>الوايلي</option>
<option value='الوحدات البحرية'>الوحدات البحرية</option>
<option value='الوراق اوسيم'>الوراق اوسيم</option>
<option value='إمبابة'>إمبابة</option>
<option value='أطفيح'>أطفيح</option>
<option value='اب الشعرية'>باب الشعرية</option>
<option value='الم هيلز'>بالم هيلز</option>
<option value='ولاق'>بولاق</option>
<option value='بولاق الكدرور'>بولاق الكدرور</option>
<option value='بيفيرلي هيلز القاهرة'>بيفيرلي هيلز القاهرة</option>
<option value='حدائق القبة'>حدائق القبة</option>
<option value='حي الاشجار'>حي الاشجار</option>
<option value='دار السلام'>دار السلام</option>
<option value='دريم لاند'>دريم لاند</option>
<option value='روض الفرج'>روض الفرج</option>
<option value='رويال غاردنز'>رويال غاردنز</option>
<option value='رويال هيلز'>رويال هيلز</option>
<option value='سقارة'>سقارة</option>
<option value='صفوة سيتي'>صفوة سيتي</option>
<option value='عابدين'>عابدين</option>
<option value='عين شمس'>عين شمس</option>
<option value='غرب'>غرب</option>
<option value='كرداسة'>كرداسة</option>
<option value='كهشور'>كهشور</option>
<option value='مدينة نصر'>مدينة نصر</option>
<option value='مصر الجديدة'>مصر الجديدة</option>
<option value='مصر القديمة'>مصر القديمة</option>
<option value='منشأة ناصر'>منشأة ناصر</option>
<option value='منف'>منف</option>
<option value='مينا غاردن سيتي'>مينا غاردن سيتي</option>
<option value='نيو جيزة'>نيو جيزة</option>
<option value='هرم ستي'>هرم ستي</option>
<option value='حدائق الاهرام'>حدائق الاهرام</option>
<option value='القاهرة الجديدة'>القاهرة الجديدة</option>
<option value='سته أكتوبر'>سته أكتوبر</option>
<option value='مدينة الشروق'>مدينة الشروق</option>
<option value='عباس العقاد'>عباس العقاد</option>
<option value='العجمي'>العجمي</option>
<option value='مدينه بدر'>مدينه بدر</option>
<option value='فيصل'>فيصل</option>
<option value='التجمع الخامس'>التجمع الخامس</option>
<option value='حدائق اكتوبر'>حدائق اكتوبر</option>
<option value='مدينه نصر'>مدينه نصر</option>
<option value='مكرم عبيد مدينة نصر'>مكرم عبيد مدينة نصر</option>
<option value='الحى الرابع'>الحى الرابع</option>
<option value='سته اكتوبر'>سته اكتوبر</option>
<option value='المعادى الجديدة'>المعادى الجديدة</option>
<option value='اكتوبر'>اكتوبر</option>
<option value='زهراء المعادى'>زهراء المعادى</option>
<option value='مصر الجديده'>مصر الجديده</option>
<option value='المعادي'>المعادي</option>
<option value='المعادى'>المعادى</option>
<option value='السادس من اكتوبر'>السادس من اكتوبر</option>
<option value='الشماليات'>الشماليات</option>
<option value='اسماعليه'>اسماعليه</option>
<option value='الشيخ زايد الحى السادس عشر'>الشيخ زايد الحى السادس عشر</option>
<option value='العبور'>العبور</option>
<option value='حى المخابرات اكتوبر'>حى المخابرات اكتوبر</option>
<option value='الشروق'>الشروق</option>
<option value='القاهره الجديده'>القاهره الجديده</option>
<option value='شرم الشيخ'>شرم الشيخ</option>
<option value='الحى العاشر'>الحى العاشر</option>
<option value='الزمالك'>الزمالك</option>
<option value='عزبة النخل'>عزبة النخل</option>
<option value='جسر السويس'>جسر السويس</option>
<option value='شبرا الخيمة'>شبرا الخيمة</option>
<option value='بدر'>بدر</option>
<option value='مدينة السلام'>مدينة السلام</option>
<option value='ارض الجولف'>ارض الجولف</option>
<option value='الياسمين'>الياسمين</option>
<option value='النعام'>النعام</option>
<option value='العباسية'>العباسية</option>
<option value='التحرير'>التحرير</option>
<option value='حدائق حلوان'>حدائق حلوان</option>
<option value='الشيخ زايد'>الشيخ زايد</option>
<option value='الساحل الشمالي'>الساحل الشمالي</option>
<option value='حي الأشجار'>حي الأشجار</option>
<option value='الغردقة'>الغردقة</option>
<option value='مدينة العبور'>مدينة العبور</option>
<option value='العين السخنه'>العين السخنه</option>
<option value='المنيب'>المنيب</option>
<option value='دمياط'>دمياط</option>
<option value='الرحاب'>الرحاب</option>
<option value='جمال عبد الناصر'>جمال عبد الناصر</option>
<option value='وادي النطون'>وادي النطون</option>
<option value='حلوان'>حلوان</option>
<option value='العجمى'>العجمى</option>
<option value='سوهاج'>سوهاج</option>
<option value='الدقى'>الدقى</option>
<option value='حدائق الأهرام'>حدائق الأهرام</option>
<option value='المريوطية'>المريوطية</option>
<option value='شبرا'>شبرا</option>
<option value='مدينة اكتوبر'>مدينة اكتوبر</option>
<option value='جمصة'>جمصة</option>
<option value='منتجع السليمانيه'>منتجع السليمانيه</option>
<option value='فينيسيا'>فينيسيا</option>
<option value='التجمع'>التجمع</option>
<option value='سيدى عبدالرحمن - الساحل الشمالى'>سيدى عبدالرحمن - الساحل الشمالى</option>
<option value='كاليبسو '>كاليبسو </option>
<option value='6اكتوبر '>6اكتوبر </option>
<option value='وسط القاهرة'>وسط القاهرة</option>
<option value='الغردقه'>الغردقه</option>
<option value='مساكن شيراتون'>مساكن شيراتون</option>
<option value='مدينة الشروق'>مدينة الشروق</option>
<option value='حدائق القبة'>حدائق القبة</option>
<option value='وادي النطرون'>وادي النطرون</option>
<option value='خليج راس الحكمه - مطروح'>خليج راس الحكمه - مطروح</option>
<option value='مدينه العبور'>مدينه العبور</option>
<option value='مكرم عبيد'>مكرم عبيد</option>
<option value='العجمى'>العجمى</option>
<option value='العاشر'>العاشر</option>
<option value='امام مارينا 7 - الساحل الشمالى'>امام مارينا 7 - الساحل الشمالى</option>
<option value='جمال عبد الناصر'>جمال عبد الناصر</option>
<option value='بلولاجون'>بلولاجون</option>
<option value='زهراء المعادى'>زهراء المعادى</option>
<option value='السادس من اكتوبر'>السادس من اكتوبر</option>
<option value='المريوطية'>المريوطية</option>
<option value='وسط البلد القاهرة'>وسط البلد القاهرة</option>
<option value='الصف'>الصف</option>
<option value='طريق مصر اسكندرية الصحراوى '>طريق مصر اسكندرية الصحراوى </option>
<option value='الساحل الشمالى - ماونتن فيو'>الساحل الشمالى - ماونتن فيو</option>
<option value='وسط البلد - القاهرة'>وسط البلد - القاهرة</option>
<option value='بركة السبع'>بركة السبع</option>
<option value='بلبيس '>بلبيس </option>
<option value='ف الكيلو 64 من مدينه راس سدر - جنوب سيناء '>ف الكيلو 64 من مدينه راس سدر - جنوب سيناء </option>
<option value='الحى الاول'>الحى الاول</option>
<option value='مرسى علم'>مرسى علم</option>
<option value='غرب سوميد '>غرب سوميد </option>
<option value='التجمع الاول'>التجمع الاول</option>
<option value='النزهة الجديدة 2'>النزهة الجديدة 2</option>
<option value='النزهة'>النزهة</option>
<option value='العباسبة'>العباسبة</option>
<option value='حمامات القبة'>حمامات القبة</option>
<option value='بيفرلى هيلز'>بيفرلى هيلز</option>
<option value='مدينة بدر'>مدينة بدر</option>
<option value='النزهه'>النزهه</option>
<option value='السيدة زينب'>السيدة زينب</option>
<option value='العين السخنه - السويس'>العين السخنه - السويس</option>
<option value='راس صدر'>راس صدر</option>
<option value='مدينه الشروق'>مدينه الشروق</option>
<option value='منطقة العبور'>منطقة العبور</option>
<option value='مرسي مطروح'>مرسي مطروح</option>
<option value='راس سدر - جنوب سيناء'>راس سدر - جنوب سيناء</option>
<option value='الهانوفيل'>الهانوفيل</option>
 <option value='هليوبوليس الجديدة'>هليوبوليس الجديدة</option>
<option value='القادسيه'>القادسيه</option>
<option value='طريق مصر الفيوم '>طريق مصر الفيوم </option>
<option value='قصر النيل'>قصر النيل</option>
<option value='مدينة العاشر من رمضان'>مدينة العاشر من رمضان</option>
<option value='القاهره والجيزه '>القاهره والجيزه </option>
<option value='دمنهور'>دمنهور</option>
<option value='مدينة السادات'>مدينة السادات</option>
<option value='بشتيل'>بشتيل</option>
<option value='بدر '>بدر </option>
<option value='مصر'>مصر</option>
<option value='جسر السويس الجديدة'>جسر السويس الجديدة</option>
<option value='جنوب سينا راس سدر'>جنوب سينا راس سدر</option>
<option value='شبين الكوم'>شبين الكوم</option>
<option value='المعادى الجديده '>المعادى الجديده </option>
<option value='النوبارية'>النوبارية</option>
<option value='السادات'>السادات</option>
<option value='طنطا'>طنطا</option>
<option value='الشيخ زابد'>الشيخ زابد</option>
<option value='مطروح العلمين'>مطروح العلمين</option>
<option value='طريق الفيوم'>طريق الفيوم</option>
<option value='شارع مراد'>شارع مراد</option>
<option value='شارع السودان'>شارع السودان</option>
<option value='شارع البحر الاعظم'>شارع البحر الاعظم</option>
<option value='مدينة نصر '>مدينة نصر </option>
<option value='القادسية'>القادسية</option>
<option value='سيوة'>سيوة</option>
<option value='جنوب سيناء'>جنوب سيناء</option>
<option value='بجوار مدينة السادات '>بجوار مدينة السادات </option>
<option value='مدينه بدر'>مدينه بدر</option>
<option value='العاصمة الادارية الجديدة'>العاصمة الادارية الجديدة</option>
<option value='كفر الشيخ'>كفر الشيخ</option>
<option value='عجيبة مطروح'>عجيبة مطروح</option>
<option value='قباء '>قباء </option>
</select>
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('ad_owner_phone',trans('admin.ad_owner_phone'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::number('ad_owner_phone', $building->ad_owner_phone ,['class'=>'form-control','placeholder'=>trans('admin.ad_owner_phone'), 'min' => '0']) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('ad_price',trans('admin.ad_price'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('ad_price', $building->ad_price ,['class'=>'form-control','placeholder'=>trans('admin.ad_price')]) !!}
    </div>
    <div class='col-md-3'>
    	<select>
    		<option selected>جنيه مصري</option>
    	</select>
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('ad_sort',trans('admin.ad_sort'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        <select name="ad_sort">
        	<option value="ownership" @if($building->ad_sort == 'ownership') selected @endif>تمليك</option>
        	<option value="rent" @if($building->ad_sort == 'rent') selected @endif>إيجار</option>
        </select>
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('ad_keywords',trans('admin.ad_keywords'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('ad_keywords', $building->ad_keywords ,['class'=>'form-control','placeholder'=>trans('admin.ad_keywords')]) !!}
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
		
