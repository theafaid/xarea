@extends('layouts.app')
@section('title')
إعلاناتي  | {{auth()->user()->name}} 
@endsection

@push('js-header')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endpush


@section('content')
<!-- property area -->
        <div class="content-area recent-property" style="background-color: #FFF;">
                <div class="row">

                    <div class="col-md-9 pr-30 padding-top-40 properties-page user-properties">

                        <div class="section"> 
                            <div class="page-subheader sorting pl0 pr-10">


                                <ul class="sort-by-list pull-right">
                                    <li class="active">
                                        <a href="{{url('new')}}" class="login" id="addNew_from_myAds" >
                                            إضافة جديدة 					
                                        </a>
                                    </li>
                                </ul><!--/ .sort-by-list-->

                            </div>

                        </div>

                        <div class="section"> 
                            <div id="list-type" class="proerty-th-list">
                                @foreach($userAds as $ad)
                                <div class="col-md-4 p0">
                                    <div class="box-two proerty-item">
                                        <div class="item-thumb">
                                         	@if(!empty($ad->ad_main_photo))
                                         	<a href="{{url('flat/'.$ad->id)}}"><img src="{{it()->url($ad->ad_main_photo)}}" />
                                         	@else
                                         	<a href="{{url('flat/'.$ad->id)}}"><img src="{{url('design/frontend')}}/assets/img/no-image.jpg" /></a>
                                         	@endif
                                        </div>
                                        <div class="item-entry overflow">
                                            <h5><a href="{{url('flat/'. $ad->id)}}">{{str_limit($ad->ad_title, 20)}}</a>
                                                <span class='pull-left'>
                                                    @if($ad->active == 0)
                                                        فى انتظار التفعيل
                                                    @else
                                                        مفعل
                                                    @endif

                                                </span>
                                            </h5>
                                            <div class="dot-hr"></div>
                                            <span class="pull-left"><b>المساحة  : </b>{{$ad->ad_space}} م<sup>2</sup></span>
                                            <span class="proerty-price pull-right">{{$ad->ad_price}}</span>
                                            <p style="display: none;">{{str_limit($ad->ad_description, 60)}}</p>

                                                    @if($ad->active == 1)
                                                    <a href="{{url('flat/'.$ad->id)}}" class='btn btn-success btn-myAd-show'>عرض   </a>
                                                    @endif
                                                    @if($ad->active == 0)
                                                    <a href="{{url('edit/flat/'.$ad->id)}}" class="btn btn-primary btn-myAd-edit"><i class='fa fa-edit'></i></a>
                                                    @endif
                                                    <a href="property-1.html" class="btn btn-danger btn-myAd-delete"><i class='fa fa-trash'></i></a>
                                            </div>


                                    </div>
                                </div> 
                                @endforeach   


                            </div>
                        </div>

                        <div class="section"> 
                            <div class="pull-right">
                                <div class="pagination">
                                    {{$userAds->render()}} 
                                </div>
                            </div>                
                        </div>

                    </div>       
                </div>
            </div>
@endsection