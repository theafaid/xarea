@extends('layouts.app')
@section('content')


@section('title')
    {{isset($homeTitle) ? $homeTitle : 'الإعلانات'}} | {{!empty(setting()->sitename) ? setting()->sitename : ''}}
@endsection

@push('js-header')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endpush


@section('header-content')
              
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

          
@endsection

@section('content')
<div class="row">
    <div class='col-xs-12'>
        @if(isset($result) && !empty($result))
        <ol class="breadcrumb">
          <li><a href="{{url('')}}">الرئيسية</a></li>
          @foreach($result as $key => $val)
          <li><a href="{{url('search/flats?' . $key . '=' .$val)}}">{{nicename($key) . " : " . $val }}</a></li>
          @endforeach
        </ol>
        @endif
    </div>
    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
        <!-- /.feature title -->
        <h2 class='search-header'>
         @if(isset($flat_type)) 

         أخر الشقق المعلن عنها  [{{$flat_type}}]
           <span>{{$sortCount}}</span>

         @elseif(isset($advancedSearchTitle))

            @if($count > 0 )
            {{$advancedSearchTitle}} 
            <span>( {{$count}} )</span>
            @else
            <p class='alert alert-danger'>نأسف لذلك .. لايوجد شقق مطابقة لبحثك</p>
            @endif
         @endif
        </h2><br>
    </div>
</div>

<div class="row">
    <div class='col-md-3 fixed-top'>
        <!-- start smart seach -->
         <div class="panel panel-default sidebar-menu wow fadeInRight animated" >
                                <div class="panel-heading">
                                    <h3 class="panel-title">بحث متقدم</h3>
                                </div>
                                <div class="panel-body search-widget">
                                    <div class='button text-center'>
                                        <button class="navbar-btn nav-button login" onclick=" window.open('{{url('flats/rent')}}', '_self')" data-wow-delay="0.5s">إيجار
                                        </button>

                                        <button class="navbar-btn nav-button login" onclick=" window.open('{{url('flats/ownership')}}', '_self')" data-wow-delay="0.5s">تمليك 
                                        </button>

                                    </div>
                                    <form action="{{url('search/flats')}}" method="get" class=" form-inline"> 
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <input type="text" name="ad_keywords" class="form-control" placeholder="إبحث عن">
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="row">
                                                <div class="col-xs-12">

                                                    <select name="ad_town" id="lunchBegins" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="إختار  المدينة">
                                                            @foreach(towns() as $key => $val)
                                                            <option value="{{$key}}">{{$val}}</option>
                                                            @endforeach
                                                        </select>
                                                </div><br><br>
                                                <div class="col-xs-12">

                                                    <select name="ad_status" id="basic" class="selectpicker show-tick form-control">
                                                            @foreach(statuses() as $key => $val)
                                                            <option value={{$key}}>{{$val}}</option>
                                                            @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                        </fieldset>

                                         <fieldset>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <input id="search-space-field" type="number" name="ad_space" class="form-control" placeholder="المساحة" min="40">
                                                    <span id="space-info">م<sup>2</sup></span>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label for="price-range">السعر من :</label>
                                                    <input type="number" name="price-from" class="span2" value="" min="1" data-slider-min="0"  id="price-range" ><br />                                                                
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="property-geo">السعر إلى</label>
                                                    <input type="number" class="span2" value="" min="2" data-slider-min="0" 
                                                           name="price-to" id="property-geo" ><br />
                                                                                                   
                                                </div>                                            
                                            </div>
                                        </fieldset>                                

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label for="ad_room_count">عدد الغرف :</label>
                                                    <input type="number" name="ad_room_count" class="span2" value="" min="1" max="9" placeholder="1" ><br />                                                
                                                </div>

                                                <div class="col-xs-6">
                                                    <label for="property-geo">عدد الحمامات</label>
                                                    <input type="number" name="ad_bathroom_count" class="span2" value="" placeholder="1" min="1" max="9"><br />
                                                </div>
                                            </div>
                                        </fieldset>

                                         <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label for="price-range">عدد المطابخ</label>
                                                    <input type="number" name="ad_kitchen_count" class="span2" value="" min="1" max="9" placeholder="1" ><br />                                                
                                                </div>

                                                <div class="col-xs-6">
                                                    <label for="property-geo">عدد  الريسيبشن</label>
                                                    <input type="number" name="ad_reseption_count" class="span2" value="" placeholder="1" min="1" max="9"><br />
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label for="price-range">الشقة مفروشة</label>
                                                    <input type="checkbox" value= name="ad_furnished" class="span2">
                                                    <br />                                                
                                                </div>
                                            </div>
                                        </fieldset>


                                        <fieldset >
                                            <div class="row">
                                                <div class="col-xs-12">  
                                                    <input class="button btn largesearch-btn" value="بحث" type="submit">
                                                </div>  
                                            </div>
                                        </fieldset>     
                                    </form>
                                </div>
                            </div>
        <!-- end smart search -->
    </div>



    <div class='col-md-9'>
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
                              <h5><a href="{{url('flat/'. $flat->id)}}" >{{str_limit($flat->ad_title, 20)}}</a></h5>
                              <div class='dot-hr'></div>
                              
                                <span class="btn btn-success ad_town">
                                    <span class='pull-right'> المدينة  :</b> {{$flat->ad_town}}</span>
                                    | 
                                    <span class='pull-left'>{{$flat->ad_sort}}</span>
                                </span><br>
                                <div>
                                    <div class='info'>
                                        <span class='btn btn-primary pull-right'>{{$flat->ad_space}} م<sup>2</sup></span>
                                        <span class='btn btn-primary pull-left'>{{$flat->ad_status}}</span>
                                    </div><br>
                                </div>
                          </div>
                      </div>
                  </div>
              </div>
              
  @endforeach

       
            {{ $flats->appends(Request::except('page'))->render() }}
       
    </div>
</div>
@endsection
