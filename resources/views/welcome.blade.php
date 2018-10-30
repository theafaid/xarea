@extends('layouts.app')
@section('title')
{{getLang() == 'ar' ? 'المنطقة إكس' : 'XArea'}}
@endsection

@section('header-content')




<div class="slider-area" id="header" style="background:url({{

    !empty(setting()->site_header_background) ? it()->url(setting()->site_header_background) : url('design/frontend/assets/spearImg/header-background.jpeg')


}});">
            <div class="slider">
                <div id="bg-slider" class="owl-carousel owl-theme">

                </div>
            </div>
            <div class="slider-content">
                <div class="row">
                    <div id='welcomepage-header'>
                        <h1 class='hidden-xs' id="head-title"></h1>
                        <h4 class='hidden-xs' id='head-description'></h4>
                    </div>
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
                        <div class="search-form wow pulse" data-wow-delay="0.8s">

                            <form action="{{url('search/flats')}}" class="form-inline text-center">
                                <button class="btn  toggle-btn" id="show-search" type="button"><i class="fa fa-bars"></i></button>

                                <div class="form-group">
                                    <input type="text" name="ad_keywords" class="form-control" placeholder="كلمات مفتاحية">
                                </div>
                                <div class="form-group">                                   
                                    <select name="ad_town" id="lunchBegins" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="إختار  المدينة">
                                          @foreach(towns() as $key => $val)
                                                <option value="{{$key}}">{{$val}}</option>
                                          @endforeach
                                  F  </select>
                                </div>
                                <div class="form-group">                                     
                                    <select name="ad_status" id="basic" class="selectpicker show-tick form-control">
                                           @foreach(sorts() as $key => $val)
                                                <option value={{$key}}>{{$val}}</option>
                                           @endforeach  
                                    </select>
                                </div>
                                <button class="btn search-btn" type="submit"><i class="fa fa-search"></i></button>

                                <div style="display: none;" class="search-toggle">

                                    <div class="search-row">   

                                        <div class="form-group mar-r-20">
                                            <label for="price-range" id="priceRange">السعر من وإلى</label>
                                            <input type="number" name="ad_price" class="span2" value="" data-slider-min="0" 
                                                   data-slider-max="1000000" data-slider-step="5" 
                                                   data-slider-value="[200,1000000]" id="price-range" ><br />
                                            <b class="pull-left color">200 جنيه</b> 
                                            <b class="pull-right color">10,000000 جنيه</b>
                                        </div>
                                        <!-- End of  -->  

                                        <div class="form-group mar-l-20">
                                            <label for="property-geo">المساحة (م)<sup>2</sup></label>
                                            <input type="text" name="ad_space" class="span2" id="spaceRange" value="" data-slider-min="0" 
                                                   data-slider-max="600" data-slider-step="5" 
                                                   data-slider-value="[50,450]" id="property-geo" ><br />
                                            <b class="pull-left color">40m</b> 
                                            <b class="pull-right color">12000m</b>
                                        </div>
                                        <!-- End of  --> 
                                    </div>

                                    <div class="search-row">

                                        <div class="form-group mar-r-20">
                                            <label for="price-range" id="roomRange">عدد الغرف</label>
                                            <input type="text" name="ad_room_count" class="span2" value="" data-slider-min="0" 
                                                   data-slider-max="600" data-slider-step="5" 
                                                   data-slider-value="[1,10]" id="min-baths" ><br />
                                            <b class="pull-left color">1</b> 
                                            <b class="pull-right color">10</b>
                                        </div>
                                        <!-- End of  --> 
                                         <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    مفروشة ؟ <input type="checkbox">
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <!-- End of  --> 

                                    </div>
                                    <br>
                                                               
                                    <button class="btn search-btn prop-btm-sheaerch" type="submit"><i class="fa fa-search"></i></button>  
                                </div>                    

                            </form>
                        </div>


                        
                    </div>
                </div>
            </div>
</div>
@endsection

@section('content')
@if(isset($flats))
<div class="row">
    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
        <!-- /.feature title -->
        <h2>العقارات الرائجة</h2><br>
    </div>
</div>


<div class='row'>
 @foreach($flats as $key => $flat)
              
              @if($key%3==0 && $key!=0)
              <div class='clearfix'></div>
              <hr>
              @endif

            <div class="proerty-th">
                  <div class="col-xs-12 col-sm-6 col-md-4 p0">
                      <div class="box-two proerty-item">
                          <div class="item-thumb">
                              <a href="{{url('flat/'. $flat->id)}}" >
                                      @if(!empty($flat->ad_main_photo))
                                      <img src="{{it()->url($flat->ad_main_photo)}}">
                                      @else
                                      <img src="{{url('design/frontend')}}/assets/img/no-image.jpg" />
                                      @endif
                                      <span class='flat-price'>LE <bdi>{{$flat->ad_price}}</bdi></span>
                          </div>
                          <div class="item-entry overflow">
                              <h5><a href="{{url('flat/'. $flat->id)}}" >{{str_limit($flat->ad_title, 28)}}</a></h5>
                              <div class='dot-hr'></div>
                              
                                <a href="{{url('search/flats?ad_town='.$flat->ad_town)}}"><span class="btn btn-success ad_town">المدينة  :</b> {{$flat->ad_town}}</span></a><br>
                              

                              <div class="sort-status">
                                 <a href="{{$flat->ad_sort == 'إيجار' ? url('flats/rent') :  url('flats/ownership')}}">
                                  <span class="proerty-price pull-right btn btn-danger sort-right">             {{$flat->ad_sort}}
                                  </span>
                                 </a>

                                <a href="{{url('search/flats?ad_status='.$flat->ad_status)}}">
                                  <span class="proerty-price text-center btn btn-danger status-center"> {{$flat->ad_status}}</span>
                                </a>

                                <a href="{{url('search/flats?ad_furnished='. $flat->ad_furnished)}}">
                                    <span class="proerty-price pull-left btn btn-danger furnished-left">{{$flat->ad_furnished == 'yes' ? 'مفروشة' : 'غير مفروشة'}}</span>
                                </a>
                              </div>

                              <div class="dot-hr"></div>
                              
                              <div>
                                <a href="{{url('search/flats?ad_space='.$flat->ad_space)}}">
                                  <span class="proerty-price pull-right btn btn-primary"><b>المساحة  :</b> {{$flat->ad_space}}</span>
                                </a>
                                <a href="{{url('search/flats?ad_room_count='.$flat->ad_room_count)}}">
                                  <span class="proerty-price text-center btn btn-primary center-center"><b>الغرف :</b> {{$flat->ad_room_count}}</span>
                                </a>
                                <a href="{{url('search/flats?ad_bathroom_count='.$flat->ad_bathroom_count)}}">
                                <span class="proerty-price pull-left btn btn-primary"><b>الحمامات :</b> {{$flat->ad_bathroom_count}}</span>

                              </div><br>

                              
                          </div>
                      </div>
                  </div>
              </div>
              
  @endforeach
</div><hr>
@else
<!-- alert no ads message -->
<div class='alert alert-danger'>لم يتم إضافة أى إعلان حتى الآن</div>
@endif
@endsection

@section('footer-content')

        <!-- Count area -->
        <div class="count-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                        <!-- /.feature title -->
                        <h2>إحصائيات </h2> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12 percent-blocks m-main" data-waypoint-scroll="true">
                        <div class="row">
                            <div class="col-sm-4 col-xs-4">
                                <div class="count-item">
                                    <div class="count-item-circle">
                                        <span class="pe-7s-users"></span>
                                    </div>
                                    <div class="chart" data-percent="5000">
                                        <input id="usersCount" type='hidden' value="{{$usersCount}}">
                                        <h2 class="percent" id="counter">{{$usersCount}}</h2>
                                        <h5> الأعضاء </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-4">
                                <div class="count-item">
                                    <div class="count-item-circle">
                                        <span class="pe-7s-home"></span>
                                    </div>
                                    <div class="chart" data-percent="12000">
                                        <input id="flatsCount" type='hidden' value="{{$flatsCount}}">
                                        <h2 class="percent" id="counter1">{{$flatsCount}}</h2>
                                        <h5>الإعلانات</h5>
                                    </div>
                                </div> 
                            </div> 
                            <div class="col-sm-4 col-xs-4">
                                <div class="count-item">
                                    <div class="count-item-circle">
                                        <span class="pe-7s-check"></span>
                                    </div>
                                    <div class="chart">
                                        <h2 class="percent">{{$onlineCount}}</h2>
                                        <h5>اونلاين</h5>
                                    </div>
                                </div> 
                            </div> 
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    
@endsection
@push('js')

<script>
    $("#show-search").on('click', function(){
        $('#welcomepage-header').toggle();
    });
</script>
<script>
      $(function(){
          $("#head-title").typed({
            @if(!empty(setting()->site_header_text))
            strings: ["{{setting()->site_header_text}}"],
            @else
            strings: [""],
            @endif
            typeSpeed: 100,
            loop: false,
            startDelay: 100,
            @if(!empty(setting()->site_header_description))
            callback: function() {
                $("#head-description").fadeIn(200);
                $("#head-description").typed({
                    strings: ["{{setting()->site_header_description}}"],
                    typeSpeed: 30,
                    loop: false, 
                    startDelay: 100
                });

            },
            @endif
          });

      });

</script>

<script>
      function getUrl($url){
            return "{{url('')}}" + "/" + $url;
      }
</script>

@endpush