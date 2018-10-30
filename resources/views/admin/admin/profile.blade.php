@extends('admin.index')
@section('content')
<div class="content-wrapper">


    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
             
              <li><a href="#settings" data-toggle="tab">إعدادات الحساب</a></li>
            </ul>
            <div class="tab-content">
     
              <div class="tab-pane active tab-pane" id="settings">
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <input type='hidden' name="_method" value="PUT">
                  <div class="form-group">

                    <div class="col-sm-10">
                      <label>الإسم</label>
                      <input type="text" name="name" value="{{$admin->name}}" class="form-control" id="inputName" placeholder="الإسم">
                    </div>
                  </div>
                  <div class="form-group">

                    <div class="col-sm-10">
                    	<label>البريد الإلكترونى</label>
                      <input type="email" name="email" value="{{$admin->email}}" class="form-control" id="inputEmail" placeholder="البريد الإلكترونى">
                    </div>
                  </div>
                  <div class="form-group">

                    <div class="col-sm-10">
                      <label>رقم الهاتف</label>
                      <input type="text" name="phone" value="{{!empty($admin->phone) ? $admin->phone : ''}}" class="form-control" id="inputName" placeholder="رقم الهاتف">
                    </div>
                  </div>

                  <div class="form-group">

                    <div class="col-sm-10">
                      <label>تغيير الصورة الشخصية</label>
                      <input type="file" name="photo" class="form-control" id="inputName">
                    </div>
                  </div>
              
                  <div class="form-group">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-info">تعديل معلومات حسابى</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              @if(!empty($admin->photo))
                <img class="profile-user-img img-responsive img-circle" src="{{it()->url($admin->photo)}}" alt="Amdin profile picture" style="width:50%; margin:auto" >

              @else
                <img class="text-center profile-user-img img-responsive img-circle" src="{{url('design/admin_panel/assets/spearImg/avatar.png')}}" alt="Amdin profile picture" style="width:50%; margin:auto">
              @endif
              <h3 class="profile-username text-center">{{$admin->name}}</h3>

              <p class="text-muted text-center">{{$admin->email}}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>انشأ فى</b> <a class="pull-right">{{date('Y-M-d', strtotime($admin->created_at))}}</a>
                </li>
              </ul>

              <form method="post" action="{{aurl('profile/delete')}}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="DELETE">
                <input type="submit" class='btn btn-danger' value="حذف حسابى">
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
@endsection