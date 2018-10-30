@extends('layouts.app')
@section('title')
تعديل اعلان | {{str_limit($flat->ad_title, 10)}} ..
@endsection
@push('js-header')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endpush
@section('content')
<div class='row'>
	<h2 class='lead text-center'>{{$title}}</h2>
</div>
	<form enctype="multipart/form-data" method="post">
		{{csrf_field()}}
		<input type='hidden' name="_method" value="PUT">
		<div class='row'>
			<div class='form-group'>
				<label>عنوان الإعلان</label>
				<input class='form-control' type="text" name="ad_title" value="{{$flat->ad_title}}" placeholder="عنوان الإعلان">
			</div>

			<div class='form-group'>
				<label>الوصف</label>
				<textarea class='form-control' name="ad_description" placeholder="عنوان الإعلان" rows="7">
					{{$flat->ad_description}}
				</textarea>
			</div>

			<div class="form-group">
		        <div class='col-sm-4'>
		        	<label>المدينة</label>
			        <select name="ad_town" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="إختار  المدينة">
			            @foreach(towns() as $key => $val)
			            <option value="{{$key}}" @if($flat->ad_town == $key) selected @endif>{{$val}}</option>
			            @endforeach
			        </select>
		        </div>

		        <div class='col-sm-4'>
		        	<label>النوع</label>
		        	<select name="ad_sort" id="basic" class="selectpicker show-tick form-control">
			            @foreach(sorts() as $key => $val)
			            <option value="{{$key}}" @if($flat->ad_sort == $key) selected @endif>{{$val}}</option>
			            @endforeach
			        </select>	
		        </div>

		        <div class='col-sm-4'>
		        	 <div class="form-group">
					    <label>حالة الشقة</label>
					    <select name="ad_status" id="basic" class="selectpicker show-tick form-control">
					        @foreach(statuses() as $key => $val)
					        <option value="{{$key}}" @if($flat->ad_status == $key) selected @endif>{{$val}}</option>
					        @endforeach 
					    </select>
					</div>
		        </div>
		    </div>
		</div>

		<div class='row'>
			<div class='col-sm-3'>
				<div class="form-group">
		            <label for="property-geo">الغرف</label>
		            <input name="ad_room_count" type="number" class="span2" value="{{$flat->ad_room_count}}" placeholder="عدد الغرف" data-slider-min="0" >
		        </div>
			</div>

			<div class='col-sm-3'>
				<div class="form-group">
		           <label for="property-geo">الحمام</label>
		           <input name="ad_bathroom_count" type="number" class="span2" value="{{$flat->ad_bathroom_count}}" placeholder="عدد الحمامات" data-slider-min="0" >
		        </div>
			</div>

			<div class='col-sm-3'>
				<div class="form-group">
		           <label for="property-geo">المطبخ</label>
		           <input name="ad_kitchen_count" type="number" class="span2" value="{{$flat->ad_kitchen_count}}" placeholder="عدد المطابخ" data-slider-min="0" >
		        </div>
			</div>

			<div class='col-sm-3'>
				<div class="form-group">
		            <label for="property-geo">الريسبشن</label>
		            <input name="ad_reseption_count" type="number" class="span2" value="{{$flat->ad_reseption_count}}" placeholder="عدد  الريسيبشن" data-slider-min="0" >
		        </div>
			</div>
		</div>

		<div class='row'>

			<div class='col-xs-6'>
				<div class='form-group'>
					<label for="property-geo">مساحة الشقة</label>
		    		<input name="ad_space" type="number" class="span2" value="{{$flat->ad_space}}" placeholder="مساحة الشقة بالمتر المربع" data-slider-min="0" >
				</div>
			</div>
			<div class='col-xs-6'>
				<div class='form-group'>
					<label>سعر شقتك </label>
		            <input name="ad_price" type="text" class="form-control" value="{{$flat->ad_price}}" placeholder="1000">
				</div>
			</div>
		</div>

		<div class='row'>
			<div class='col-sm-6'>
				<label>الصورة الرئيسية للإعلان</label><br>
				@if(!empty($flat->ad_main_photo))
				<div class="picture-container">
		            <div class="picture"> 
		                <img src="{{it()->url($flat->ad_main_photo)}}" class="picture-src" id="wizardPicturePreview" title=""/>
		            </div>
		        </div>
				@endif	
				 <input type="file" name="ad_main_photo" id="wizard-picture">
			</div>

			<div class='col-sm-6'>
				<label>صور اخرى</label>
			</div>
		</div>
		<div class='row'>
			<div class='col-xs-4'>
				<div class="form-group">
			        <div class="checkbox">
			            <label for="furnished"></label>
			            <br>
			            الشقة مفروشة ؟ <input type="checkbox" name="furnished" id="furnished" @if($flat->ad_furnished == 'yes') checked  @endif> 
			        </div>
			    </div>
			</div>
		</div>
		<hr>
		<div class='row'>
			<div class='col-xs-4'></div>
			<div class="col-xs-4">
				<div class='form-group text-center'>
				<input type='submit' class='btn btn-primary' value="تعديل"><br>
				</div>
	</form>
	</div>
	<div class='col-xs-4'>
</div>


@endsection