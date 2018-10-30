@extends('admin.index')
@section('content')
@if(isset($owner))
<h5>رسالة من : <a href="{{aurl('user/'.$owner[0]['id'])}}">{{$msg->name}}</a>
</h5>
@endif
<h5> البريد الإلكترونى : {{$msg->email}}
  <span class='btn btn-success'>
  الرد على {{$msg->name}}
</span>
</h5>

<h5> رقم الهاتف : {{$msg->phone}}
</h5>

<hr>
<div class='lead'>
 <h5>الرسالة :</h5>
  {{$msg->message}}
</div>
<br>


@endsection