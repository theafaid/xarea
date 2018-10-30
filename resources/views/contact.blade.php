@extends('layouts.app')


@section('title')
    تواصل معنا | {{!empty(setting()->sitename) ? setting()->sitename : '' }}
@endsection
@push('js-header')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush

@section('content')
<!-- property area -->
        <div class="content-area recent-property padding-top-40" style="background-color: #FFF;">
            <div class="container">  
                <div class="row">
                    <div class="col-md-8 col-md-offset-2"> 
                        <div class="" id="contact1">                        
                            <div class="row">
                                <div class="col-sm-4">
                                    <h3><i class="fa fa-map-marker"></i>العنوان</h3>
                                    <div class='contact-info'>
                                        <p>
                                            {{!empty(setting()->site_address) ? setting()->site_address : ''}}
                                        </p>
                                    </div>
                                </div>
                                <!-- /.col-sm-4 -->
                                <div class="col-sm-4">
                                    <h3><i class="fa fa-phone"></i>الدعم الفنى</h3>

                                    <div class="contact-info">
                                        <p class="text-muted">فى حال حدوث أى مشكلة او أردت أى معلومات أو الإعلان لدينا فقط يمكنك الإتصال على الرقم التالى ..</p>
                                        <p><strong>{{!empty(setting()->site_phone) ? setting()->site_phone : ''}}</strong></p>
                                    </div>
                                </div>
                                <!-- /.col-sm-4 -->
                                <div class="col-sm-4">
                                    <h3><i class="fa fa-envelope"></i> تواصل معنا </h3>
                                    <div class='contact-info'>
                                        <p class="text-muted">لإرسال أى معلومات او اقتراحات أو فى حالة أردت مراسلتنا عبر البريد الإلكترونى</p>
                                        <ul>
                                            <li><strong><a href="mailto:">{{!empty(setting()->site_email) ? setting()->site_email : '' }}</a></strong>   </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.col-sm-4 -->
                            </div>
                            <!-- /.row -->
                            <hr>
                            <h2>إرسل رسالة إلينا</h2><br>

                            <form method="post">
                            	<input type='hidden' name="_token" value="{{csrf_token()}}">
                                <div class="row">
                                   @if(!auth()->guard('web')->user())
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="firstname">الإسم الأول</label>
                                            <input name="firstname" type="text" class="form-control" value="{{old('firstname')}}" id="firstname">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="lastname">الإسم الأخير</label>
                                            <input name="lastname" type="text" class="form-control" value="{{old('lastname')}}" id="lastname">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">البريد الإلكترونى</label>
                                            <input name="email" type="email" class="form-control" value="{{old('email')}}" id="email">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="phone">رقم الهاتف</label>
                                            <input name="phone" type="text" class="form-control" value="{{old('phone')}}" id="phone">
                                        </div>
                                    </div>
                                   @endif
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="message">الرسالة</label>
                                            <textarea name="message" id="message" value="{{old('message')}}" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 text-center">
                                        <button type="submit" class="btn btn-primary btn-block">إرسل  <i class="fa fa-envelope-o"></i></button>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </form>
                        </div>
                    </div>    
                </div>
            </div>
        </div> 
@endsection
