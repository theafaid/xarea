@if(!empty($errors))
@foreach($errors->all() as $error)
<script>
	swal({
	  title: "لم ينجح الإرسال",
	  text: "{{$error}}",
	  icon: "warning",
	  dangerMode: true,
	});
</script>
@endforeach
@endif

@if(session()->has('success'))
	<script type="text/javascript">
		swal("تم ", "{{session('success')}}", "success");
	</script>
@endif

@if(session()->has('incorrect_old_pass'))
	<script>
		swal({
		  title: "لم يتم تحديث معلوماتك",
		  text: "{{session('incorrect_old_pass')}}",
		  icon: "warning",
		  dangerMode: true,
		});
	</script>
@endif


@if(session()->has('failedToAdd'))
	<script>
		swal({
		  title: "عفوا لايمكنك إضافة إعلان",
		  text: "{{session('failedToAdd')}}",
		  icon: "warning",
		  dangerMode: true,
		});
	</script>
@endif

@if(session()->has('notFound'))
	<script>
		swal({
		  title: "نتائج فارغة",
		  text: "{{session('notFound')}}",
		  icon: "warning",
		  dangerMode: true,
		});
	</script>
@endif