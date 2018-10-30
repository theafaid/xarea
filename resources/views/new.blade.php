@extends('layouts.app')
@section('title')
إضافة إعلان جديد | {{!empty(setting()->sitename) ? setting()->sitename : ''}}
@endsection

@push('css-header')
<link rel="stylesheet" href="{{url('design/frontend')}}/assets/css/wizard.css"> 

@endpush

@push('js-header')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endpush

@section('content')
<!-- property area -->
        <div class="content-area submit-property" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">
                <div class="clearfix" > 
                    <div class="wizard-container"> 

                        <div class="wizard-card ct-wizard-orange" id="wizardProperty">
                            <form  method="post" enctype="multipart/form-data">
                                {{csrf_field()}}                        
                                <div class="wizard-header">
                                    <h3>
                                        <b>أضف</b> إعلان لشقتك الآن <br>
                                        <small>يرجي إكمال البيانات كاملة حتى  تكون شقتك معروضة للكل بسهولة</small>
                                    </h3><br>
                                </div>

                                <ul>
                                    <li><a href="#step1" data-toggle="tab">الخطوة الأولى</a></li>
                                    <li><a href="#step2" data-toggle="tab">الخطوة الثانية</a></li>
                                    <li><a href="#step3" data-toggle="tab">الخطوة الثالثة </a></li>
                                    <li><a href="#step4" data-toggle="tab">النهاية  </a></li>
                                </ul>

                                <div class="tab-content">

                                    <div class="tab-pane" id="step1">
                                        <div class="row p-b-15  ">
                                            <h4 class="info-text">إبدأ بإدخال المعلومات الأساسية</h4>
                                            <div class="col-sm-4 col-sm-offset-1">
                                                <div class="picture-container">
                                                    <div class="picture">
                                                        <img src="{{url('design/frontend')}}/assets/img/default-property.jpg" class="picture-src" id="wizardPicturePreview" title=""/>
                                                        <input type="file" id="wizard-picture" name="ad_main_photo">
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>عنوان للعر ض <small>(يظهر في عرض إعلانك كعنوان)</small></label>
                                                    <input name="ad_title" type="text" class="form-control" placeholder="شقة تشطيب كامل ..">
                                                </div>

                                                <div class="form-group">
                                                    <label>سعر شقتك <small>(إجبارى)</small></label>
                                                    <input name="ad_price" type="text" class="form-control" placeholder="1000">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  End step 1 -->

                                    <div class="tab-pane" id="step2">
                                        <h4 class="info-text">اوصف تفاصيل شقتك ..</h4>
                                        <div class="row">
                                            <div class="col-sm-12"> 
                                                <div class="col-sm-12"> 
                                                    <div class="form-group">
                                                        <label>اوصف شقتك</label>
                                                        <textarea name="ad_description" class="form-control">
                                                        </textarea>
                                                    </div> 
                                                </div> 
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>المدينة</label>
                                                        <select name="ad_town" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="إختار  المدينة">
                                                            @foreach(towns() as $key => $val)
                                                            <option value="{{$key}}">{{$val}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                               
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>حالة الشقة</label>
                                                        <select name="ad_status" id="basic" class="selectpicker show-tick form-control">
                                                            <option value="بدون تشطيب">بدون تشطيب</option>
                                                            <option value="نصف تشطيب">نصف تشطيب</option>
                                                            <option value="تشطيب كامل">تشطيب كامل</option>
                                                            <option value="تشطيب لوكس">تشطيب لوكس</option>  
                                                            <option value="تشطيب سوبر لوكس">تشطيب سوبر لوكس</option> 
                                                            <option value="تشطيب ألترا لوكس">تشطيب ألترا لوكس</option>  
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>غرض الإعلان</label>
                                                        <select name="ad_sort" id="basic" class="selectpicker show-tick form-control">
                                                            <option>نوع العقد</option>
                                                            <option value="إيجار">إيجار </option>
                                                            <option value="تمليك">تمليك</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-sm-12 padding-top-15">                                                   
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="property-geo">مساحة الشقة</label>
                                                        <input name="ad_space" type="number" class="span2" placeholder="مساحة الشقة بالمتر المربع" data-slider-min="0" >
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">

                                                    <div class="form-group">
                                                        <label for="property-geo">الغرف</label>
                                                        <input name="ad_room_count" type="number" class="span2" placeholder="عدد الغرف" data-slider-min="0" >
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">

                                                    <div class="form-group">
                                                        <label for="property-geo">الحمام</label>
                                                        <input name="ad_bathroom_count" type="number" class="span2" placeholder="عدد الحمامات" data-slider-min="0" >
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">

                                                    <div class="form-group">
                                                        <label for="property-geo">المطبخ</label>
                                                        <input name="ad_kitchen_count" type="number" class="span2" placeholder="عدد المطابخ" data-slider-min="0" >
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">

                                                    <div class="form-group">
                                                        <label for="property-geo">الريسبشن</label>
                                                        <input name="ad_reseption_count" type="number" class="span2" placeholder="عدد  الريسيبشن" data-slider-min="0" >
                                                    </div>                                                   
                                                </div>    

                                                 <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="checkbox">
                                                            <label for="property-geo"></label>
                                                            <br>
                                                            الشقة مفروشة ؟ <input type="checkbox" name="furnished"> 
                                                        </div>
                                                    </div>
                                                </div>  


                                            </div>
                                            
                                          
                                            <br>
                                        </div>
                                    </div>
                                    <!-- End step 2 -->

                                    <div class="tab-pane" id="step3">                                        
                                        <h4 class="info-text">قم برفع بعض الصور الإضافية لشقتك و فيديوهات</h4>
                                        <div class="row">  
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="property-images">صور إضافية</label>
                                                    <input class="form-control" type="file" id="property-images">
                                                    <p class="help-block">يمكنك اضافة صور متعددة</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6"> 
                                                <div class="form-group">
                                                    <label for="property-video">  رابط فيديو مصور</label>
                                                    <input class="form-control" value="" placeholder="http://www.youtube.com" name="ad_video" type="text">
                                                </div> 
                                                <p class="help-block">أو قم برفع الفيديو من جهاز</p>
                                                <input type="file" id="property-video" class="form-control" />
                                            </div>

                                        </div>
                                    </div>
                                    <!--  End step 3 -->


                                    <div class="tab-pane" id="step4">                                        
                                        <h4 class="info-text"> الشروط والأحكام </h4>
                                        <div class="row">  
                                            <div class="col-sm-12">
                                                <div class="">
                                                    <p>
                                                        <strong>بمشاركة إعلانك فى ذلك الموقع فأنت توافق على الشروط والأحكام لدينا  . 
                                                            </strong><br>

                                                        <label>
                                                        يستخدم موقعنا إسمك وبريدك الإلكترونى ورقمك المسجلين لدينا ويحق لجميع الأشخاص رأيتهم عند عرض  أى إعلان خاص بك .    
                                                        </label>
                                                        
                                                    </p>

                                                    <div class="checkbox">
                                                        <label>
                                                             <strong>أوافق على الشروط والأحكام.</strong> <input type="checkbox" name='' />
                                                        </label>
                                                    </div> 

                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                    <!--  End step 4 -->

                                </div>

                                <div class="wizard-footer">
                                    <div class="pull-left">
                                        <input type='button' class='btn btn-next btn-primary' name='next' value='التالى >>' />
                                        <input type='submit' class='btn btn-finish btn-primary ' name='finish' value='أضف الآن' />
                                    </div>

                                    <div class="pull-right">
                                        <input type='button' class='btn btn-previous btn-default' name='previous' value='<< السابق' />
                                    </div>
                                    <div class="clearfix"></div>                                            
                                </div>  
                            </form>
                        </div>
                        <!-- End submit form -->
                    </div> 
                </div>
            </div>
        </div>

@endsection

@push('js')
        <script src="{{url('design/frontend')}}/assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
        <script src="{{url('design/frontend')}}/assets/js/jquery.validate.min.js"></script>
        <script src="{{url('design/frontend')}}/assets/js/wizard.js"></script>
@endpush