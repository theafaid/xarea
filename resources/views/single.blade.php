@extends('layouts.app')
@section('title')

@endsection

@section('content')
<div class="content-area single-property" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">   

                <div class="clearfix padding-top-40" >

                    <div class="col-md-8 single-property-content prp-style-2">
                        <div class="">
                            <div class="row">
                                <div class="light-slide-item">            
                                    <div class="clearfix">
                                        <div class="favorite-and-print">
                                            <a class="add-to-fav" href="#login-modal" data-toggle="modal">
                                                <i class="fa fa-star-o"></i>
                                            </a>
                                            <a class="printer-icon " href="javascript:window.print()">
                                                <i class="fa fa-print"></i> 
                                            </a>
                                        </div> 

                                        <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                            <li data-thumb="assets/img/property-1/property1.jpg"> 
                                                <img src="{{url('design/frontend')}}/assets/img/property-1/property1.jpg" />
                                            </li>
                                            <li data-thumb="assets/img/property-1/property2.jpg"> 
                                                <img src="{{url('design/frontend')}}/assets/img/property-1/property3.jpg" />
                                            </li>
                                            <li data-thumb="assets/img/property-1/property3.jpg"> 
                                                <img src="{{url('design/frontend')}}/assets/img/property-1/property3.jpg" />
                                            </li>
                                            <li data-thumb="assets/img/property-1/property4.jpg"> 
                                                @if(!empty($flat->ad_main_photo) && !empty(it()->url($flat->ad_main_photo)))
                                                <img src="{{it()->url($flat->ad_main_photo)}}">
                                                @else
                                                <img src="{{url('design/frontend')}}/assets/img/no-image.jpg" />
                                                @endif
                                            </li>                                         
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="single-property-wrapper">

                                <div class="section">
                                    <h4 class="s-property-title">الوصف</h4>
                                    <div class="s-property-content">
                                        <p class='lead'>{{$flat->ad_description}}</p>
                                    </div>
                                </div>
                                <!-- End description area  -->

                                

                              
                                <!-- End features area  -->

                                <div class="section property-video"> 
                                    <h4 class="s-property-title">فيديو للشقة</h4> 
                                    <div class="video-thumb">
                                   
                                           <iframe height="315" width="100%" 
                                            src="https://www.youtube.com/embed/tgbNymZ7vqY">
                                            </iframe>         
                                        
                                    </div>
                                </div>
                                <!-- End video area  -->

                                  <div class="section property-features">      

                                    <h4 class="s-property-title">كلمات البحث - الكلمات المفتاحية</h4>                            
                                    <ul>
                                        <li><a href="properties.html">{{$flat->ad_keywords}}</a></li>
                                    </ul>

                                </div>

                                <div class="section property-share"> 
                                    <h4 class="s-property-title">شارك الإعلان مع أصدقائك</h4> 

                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <!-- Go to www.addthis.com/dashboard to customize your tools --> 
                <div class="addthis_inline_share_toolbox_09om"></div>
            
                                    <div class="roperty-social">
                                        <ul> 
                                            <li><a title="Share this on dribbble " href="#"><img src="{{url('design/frontend')}}/assets/img/social_big/dribbble_grey.png"></a></li>                                         
                                            <li><a title="Share this on facebok " href="#"><img src="{{url('design/frontend')}}/assets/img/social_big/facebook_grey.png"></a></li> 
                                            <li><a title="Share this on delicious " href="#"><img src="{{url('design/frontend')}}/assets/img/social_big/delicious_grey.png"></a></li> 
                                            <li><a title="Share this on tumblr " href="#"><img src="{{url('design/frontend')}}/assets/img/social_big/tumblr_grey.png"></a></li> 
                                            <li><a title="Share this on digg " href="#"><img src="{{url('design/frontend')}}/assets/img/social_big/digg_grey.png"></a></li> 
                                            <li><a title="Share this on twitter " href="#"><img src="{{url('design/frontend')}}/assets/img/social_big/twitter_grey.png"></a></li> 
                                            <li><a title="Share this on linkedin " href="#"><img src="{{url('design/frontend')}}/assets/img/social_big/linkedin_grey.png"></a></li>                                        
                                        </ul>
                                    </div>
                                </div>
                                <!-- End video area  -->
                            </div>
                        </div>
                        <!-- Same Flats -->
                        <hr>
                        <h2 class='text-center'>{{$title}}</h2>
                        <div class='row'>
                            @if(isset($same))
                            @foreach($same as $sameFlat)
                            <div class='col-xs-4'>
                                <div class="proerty-th">
                                    <div class="box-two proerty-item">
                                        <div class="item-thumb">
                                            <a href="{{url('flat/'. $sameFlat->id)}}" >
                                                @if(!empty($sameFlat->ad_main_photo) && !empty(it()->url($sameFlat->ad_main_photo)))
                                                <img src="{{it()->url($sameFlat->ad_main_photo)}}">
                                                @else
                                                <img src="{{url('design/frontend')}}/assets/img/no-image.jpg" />
                                                @endif
                                        </div>
                                        <div class="item-entry overflow">
                                                <h5><a href="{{url('flat/'. $sameFlat->id)}}" >{{str_limit($sameFlat->ad_title, 20)}}</a></h5>
                                                <div class="dot-hr"></div>
                                                <span class="pull-left"><b>المساحة  :</b> {{$sameFlat->ad_space}} </span>
                                                <span class="proerty-price pull-right">{{$sameFlat->ad_price}}</span>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- End same Flats -->

                            @else
                            <!-- random flats -->
                            @foreach($rand as $randFlat)
                            <div class='col-xs-4'>
                                <div class="proerty-th">
                                    <div class="box-two proerty-item">
                                        <div class="item-thumb">
                                            <a href="{{url('flat/'. $randFlat->id)}}" >
                                                @if(!empty($randFlat->ad_main_photo) && !empty(it()->url($randFlat->ad_main_photo)))
                                                <img src="{{it()->url($randFlat->ad_main_photo)}}">
                                                @else
                                                <img src="{{url('design/frontend')}}/assets/img/no-image.jpg" />
                                                @endif
                                        </div>
                                        <div class="item-entry overflow">
                                                <h5><a href="{{url('flat/'. $randFlat->id)}}" >{{str_limit($randFlat->ad_title, 20)}}</a></h5>
                                                <div class="dot-hr"></div>
                                                <span class="pull-left"><b>المساحة  :</b> {{$randFlat->ad_space}} </span>
                                                <span class="proerty-price pull-right">{{$randFlat->ad_price}}</span>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            @endforeach

                            @endif
                            <!-- end random flats-->
                        </div>
                        
                    </div>
                    <div class='col-md-1'></div>
                    <div class="col-md-3 p0">
                        <aside class="sidebar sidebar-property blog-asside-right property-style2">
                            <div class="dealer-widget">
                                <div class="dealer-content">
                                    <div class="inner-wrapper">
                                        <div class="single-property-header">                                          
                                            
                                            <span class="property-price">{{$flat->ad_price}} جنيه</span>
                                        </div>

                                        <div class="property-meta entry-meta clearfix ">   

                                            <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                                <span class="property-info-icon icon-tag">                                                                                      
                                                    <img src="{{url('design/frontend')}}/assets/img/icon/sale-orange.png">
                                                f</span>
                                                <span class="property-info-entry">
                                                    <span class="property-info-label">النوع</span>
                                                    <span class="property-info-value">{{$flat->ad_sort}}</span>
                                                </span>
                                            </div>

                                            <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                                <span class="property-info icon-area">
                                                    <img src="{{url('design/frontend')}}/assets/img/icon/room-orange.png">
                                                </span>
                                                <span class="property-info-entry">
                                                    <span class="property-info-label">المساحة</span>
                                                    <span class="property-info-value">{{$flat->ad_space}}<b class="property-info-unit">م<sup>۲</sup></b></span>
                                                </span>
                                            </div>

                                            <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                                <span class="property-info-icon icon-bed">
                                                    <img src="{{url('design/frontend')}}/assets/img/icon/bed-orange.png">
                                                </span>
                                                <span class="property-info-entry">
                                                    <span class="property-info-label">المطبخ</span>
                                                    <span class="property-info-value">{{$flat->ad_kitchen_count}}</span>
                                                </span>
                                            </div>

                                            <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                                <span class="property-info-icon icon-bath">
                                                    <img src="{{url('design/frontend')}}/assets/img/icon/cars-orange.png">
                                                </span>
                                                <span class="property-info-entry">
                                                    <span class="property-info-label">الغرف</span>
                                                    <span class="property-info-value">{{$flat->ad_room_count}}</span>
                                                </span>
                                            </div>
                                            <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                                <span class="property-info-icon icon-bath">
                                                    <img src="{{url('design/frontend')}}/assets/img/icon/os-orange.png">
                                                </span>
                                                <span class="property-info-entry">
                                                    <span class="property-info-label">الحمامات</span>
                                                    <span class="property-info-value">{{$flat->ad_bathroom_count}}</span>
                                                </span>
                                            </div>

                                            <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                                <span class="property-info-icon icon-garage">
                                                    <img src="{{url('design/frontend')}}/assets/img/icon/room-orange.png">
                                                </span>
                                                <span class="property-info-entry">
                                                    <span class="property-info-label">الريسبشن</span>
                                                    <span class="property-info-value">{{$flat->ad_reseption_count}}</span>
                                                </span>
                                            </div>

                                          


                                        </div>
                                        <div class="dealer-section-space">
                                            <span>معلومات المعلن</span>
                                        </div>
                                        <div class="clear">
                                            <div class="col-xs-4 col-sm-4 dealer-face">
                                                <a href="">
                                                    @if(!empty($flat->adOwner->photo))
                                                    <img src="{{it()->url($flat->adOwner->photo)}}" class="img-circle">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="col-xs-8 col-sm-8 ">
                                                <h3 class="dealer-name">
                                                    <span>{{$flat->adOwner->name}}</span>        
                                                </h3>
                                                <h3 class="dealer-name">
                                                    <span><i class="pe-7s-call strong"> </i> {{$flat->adOwner->phone}}</span>        
                                                </h3>
                                            </div>
                                        </div>

                                        <div class="clear">
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                                <div class="panel-heading">
                                    <h3 class="panel-title">إعلن هنا</h3>
                                </div>
                                <div class="panel-body recent-property-widget">
                                    <img src="{{url('design/frontend')}}/assets/img/ads.jpg">
                                </div>
                            </div>

                            <div class="panel panel-default sidebar-menu wow fadeInRight animated" >
                                <div class="panel-heading">
                                    <h3 class="panel-title">Smart search</h3>
                                </div>
                                <div class="panel-body search-widget">
                                    <form action="" class=" form-inline"> 
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <input type="text" class="form-control" placeholder="Key word">
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="row">
                                                <div class="col-xs-6">

                                                    <select id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select Your City">

                                                        <option>New york, CA</option>
                                                        <option>Paris</option>
                                                        <option>Casablanca</option>
                                                        <option>Tokyo</option>
                                                        <option>Marraekch</option>
                                                        <option>kyoto , shibua</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-6">

                                                    <select id="basic" class="selectpicker show-tick form-control">
                                                        <option> -Status- </option>
                                                        <option>Rent </option>
                                                        <option>Boy</option>
                                                        <option>used</option>  

                                                    </select>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label for="price-range">Price range ($):</label>
                                                    <input type="text" class="span2" value="" data-slider-min="0" 
                                                           data-slider-max="600" data-slider-step="5" 
                                                           data-slider-value="[0,450]" id="price-range" ><br />
                                                    <b class="pull-left color">2000$</b> 
                                                    <b class="pull-right color">100000$</b>                                                
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="property-geo">Property geo (m2) :</label>
                                                    <input type="text" class="span2" value="" data-slider-min="0" 
                                                           data-slider-max="600" data-slider-step="5" 
                                                           data-slider-value="[50,450]" id="property-geo" ><br />
                                                    <b class="pull-left color">40m</b> 
                                                    <b class="pull-right color">12000m</b>                                                
                                                </div>                                            
                                            </div>
                                        </fieldset>                                

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label for="price-range">Min baths :</label>
                                                    <input type="text" class="span2" value="" data-slider-min="0" 
                                                           data-slider-max="600" data-slider-step="5" 
                                                           data-slider-value="[250,450]" id="min-baths" ><br />
                                                    <b class="pull-left color">1</b> 
                                                    <b class="pull-right color">120</b>                                                
                                                </div>

                                                <div class="col-xs-6">
                                                    <label for="property-geo">Min bed :</label>
                                                    <input type="text" class="span2" value="" data-slider-min="0" 
                                                           data-slider-max="600" data-slider-step="5" 
                                                           data-slider-value="[250,450]" id="min-bed" ><br />
                                                    <b class="pull-left color">1</b> 
                                                    <b class="pull-right color">120</b>

                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox" checked> Fire Place</label>
                                                    </div> 
                                                </div>

                                                <div class="col-xs-6">
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox"> Dual Sinks</label>
                                                    </div>
                                                </div>                                            
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox" checked> Swimming Pool</label>
                                                    </div>
                                                </div>  
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox" checked> 2 Stories </label>
                                                    </div>
                                                </div>  
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label><input type="checkbox"> Laundry Room </label>
                                                    </div>
                                                </div>  
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox"> Emergency Exit</label>
                                                    </div>
                                                </div>  
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label>  <input type="checkbox" checked> Jog Path </label>
                                                    </div>
                                                </div>  
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label>  <input type="checkbox"> 26' Ceilings </label>
                                                    </div>
                                                </div>  
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-12"> 
                                                    <div class="checkbox">
                                                        <label>  <input type="checkbox"> Hurricane Shutters </label>
                                                    </div>
                                                </div>  
                                            </div>
                                        </fieldset>

                                        <fieldset >
                                            <div class="row">
                                                <div class="col-xs-12">  
                                                    <input class="button btn largesearch-btn" value="Search" type="submit">
                                                </div>  
                                            </div>
                                        </fieldset>                                     
                                    </form>
                                </div>
                            </div>

                        </aside>
                    </div>

                </div>

            </div>
        </div>
@endsection