@extends('layouts.app')

@push('js-header')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endpush

@section('content')

    <div class="content-area user-profiel" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">   
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 profiel-container">

                        <form method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="profiel-header">
                                <h3>
                                    <b>تعديل</b> حسابك الشخصى<br>
                                    <small>برجاء إكمال معلومات ملفك الشخصى كاملة</small>
                                </h3>
                                <hr>
                            </div>

                            <div class="clear">
                                <div class="col-sm-3 col-sm-offset-1">
                                    <div class="picture-container">
                                        <div class="picture">
                                            
                                            <img src="{{it()->url($user->photo)}}" class="picture-src" id="wizardPicturePreview" title=""/>
                                            
                                            <input type="file" name="photo" id="wizard-picture">
                                        </div>
                                        <h6>الصورة الشخصية</h6>
                                    </div>
                                </div>

                                <div class="col-sm-3 padding-top-25">

                                    <div class="form-group">
                                        <label>الإسم  <small>(مطلوب  )</small></label>
                                        <input name="name" type="text" class="form-control" value="{{auth()->user()->name}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>البرريد الإلكترونى <small></small></label>
                                        <input name="email" type="email" class="form-control" value="{{auth()->user()->email}}">
                                    </div> 
                                </div>
                                  
                                <div class='col-sm-3 padding-top-25'>
                                    <div class="form-group">
                                        <label>رقم الهاتف :</label>
                                        <input name="phone" type="text" class="form-control" placeholder="01************" value={{auth()->user()->phone}}>
                                    </div>

                                    <div class='form-group'>
                                        <div class="form-group">
                                                <label>كلمة المرور  القديمة  : <small></small></label>
                                                <input name="old-password" type="password" class="form-control">
                                        </div>  
                                    </div>
                                </div>

                                <div class='col-sm-6 padding-top-25'>
                                      <div class='form-group pull-right'>
                                        <input type='button' class='btn changePass btn-danger' value='تغيير كلمة المرور' />

                                        <input type='button' class='btn rm-changePass btn-success' value='إلغاء تغيير كلمة المرور' />
                                    </div>
                                    
                                     <div class='form-group'>
                                        
                                        <div class="col-sm-12 padding-top-25 hidden" id="changePassForm">  
                                            <div class="form-group">
                                                <label>كلمة المرور الجديدد  : <small></small></label>
                                                <input name="Password" type="password" class="form-control">
                                            </div>
                                                <div class="form-group">
                                                        <label>تأكيد كلمة المرور : <small></small></label>
                                                        <input type="password" name="password_confirmation" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                    <input type='submit' class='btn btn-finish btn-block btn-primary' value='تعديل' />

                                </div>

                    
                            <div class="col-sm-5 col-sm-offset-1">
                                <br>
                                
                            </div>
                            <br>
                    </form>

                </div>
            </div><!-- end row -->

        </div>
    </div>
@endsection