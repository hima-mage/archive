<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>:: Archive ::</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Baxster Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="/assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="/assets/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link rel="icon" href="/favicon.ico" type="image/x-icon" >
<!-- font-awesome icons -->
<link href="/assets/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- chart -->
<script src="/assets/js/Chart.js"></script>
<!-- //chart -->
 <!-- js-->
<script src="/assets/js/jquery-1.11.1.min.js"></script>
<script src="/assets/js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
	$(document).ready(function(){
		var date_input=$('input[name="date"], input[name="follow_date"], input[name="recieve_date"],input[name="date1"],input[name="date2"],input[name="date3"],input[name="date4"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'yyyy-mm-dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		});
		
	})
</script>
<!--//webfonts--> 
<!--animate-->
<link href="/assets/css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="/assets/js/wow.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">

	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="/assets/js/metisMenu.min.js"></script>
<script src="/assets/js/custom.js"></script>
<link href="/assets/css/custom.css" rel="stylesheet">

<link href="/assets/css/sweetalert2.min.css" rel="stylesheet" type="text/css" media="all">
<script src="/assets/js/sweetalert2.min.js"></script>
<script>
$(document).click(function(e){
	$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });

  $('.delete-confirmation').click(function(e){
	e.preventDefault();
	form = $(this).closest('form');
	swal({
		title: 'هل تريد بالفعل حذف هذا العنصر؟',
		text: "!لن تتمكن من استعادته مرة أخرى",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#d33',
		cancelButtonColor: '#3085d6',
		confirmButtonText: '!نعم, قم بالحذف',
		cancelButtonText: 'إلغاء'
	  }).then(function () {
		form.submit();
	  },function(cancel){
		  
	})
  });
});
</script>

<!--//Metis Menu -->
<style>
	.invalid-feedback {
		color: crimson;
		font-size:small;
	}
	.table-responsive {
		direction: rtl;
	}
</style>
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		@include('back-end.layout.side-bar')

		<div id="page-wrapper">
			<div class="main-page">
			
                @yield('content')
			</div>
		</div>
		<!--footer-->
        <!--//footer-->
	</div>
	<!-- Classie -->
	<!-- Bootstrap Core JavaScript --> 
		
	<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>

	<link href="css/bootstrap.min.css" rel="stylesheet">



	<!--max-plugin-->
	<!--//max-plugin-->
	<!--scrolling js-->
	<script src="/assets/js/jquery.nicescroll.js"></script>
	<script src="/assets/js/scripts.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script><script src="https://momentjs.com/downloads/moment.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

	<script>
		/*
		jQuery(document).ready(function () {
			$('select').select2();
		});
		*/
		$("#tableshowdata").dataTable({
			"oLanguage": {
				"sEmptyTable": "جدول يحتوي على جميع الملفات المضافة مقسم لصفحات وكل صف أمامه إمكانية العرض والتعديل والحذف"
			}
			//	"EmptyTable":  ,
		});
		$(document).on("click", ".addRow", function () {
			//var res = $(this).parent().parent().parent().parent().parent().html();
			res = '<div><div class="col-md-6">\
												<div class="col-md-12">\
													<div class="col-md-3"><label>اسم الملف</label></div>\
													<div class="col-md-6"><input type="text" class="form-control"></div>\
													<div class="col-md-3"><button type="file" class="btn btn-default"> تصفح </button></div>\
												</div>\
											</div>\
											<div class="col-md-6">\
												<div class="col-md-12">\
													<div class="col-md-6">\
														<div class="input-group date" id="datetimepicker11"> <input type="text" class="form-control" /> <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"> </span> </span></div></div><div class="col-md-2">\
														<button class="btn btn-info"> عرض 	</button>\
													</div>\
													<div class="col-md-4">\
														<button class="btn btn-sm btn-danger deleteRow"> <i class="fa  fa-times"> </i> 	</button>\
															<button class="btn btn-sm btn-success addRow"> <i class="fa fa-plus"> </i> 	</button>\
														</div></div></div><br><br></div>'
			$("#rowsE").append(res);
			$(".dateNow").val(output);
		});
		$(document).on("click", ".deleteRow", function () {
			$(this).parent().parent().parent().parent().fadeOut();

		});



		$(document).on("click", ".addRowAleart", function () {
			//var res = $(this).parent().parent().parent().parent().parent().html();
			res = '<div><div class="col-md-10"><div class="col-md-12"><div class="col-md-4"><label> نوع التذكير</label><select name="field-2" id="field-2" required="true" class="form-control" ><option value=""></option><option value="val-1">Value 1</option><option value="val-2">Value 2</option></select></div><div class="col-md-4"><label> الوقت والتاريخ </label><input type="date" class="form-control dateAlert" /></div><div class="col-md-4"><label>  الأشخاص</label><select name="field-2" equired="true" class="form-control" multiple><option value=""></option><option value="val-1">Value 1</option><option value="val-2">Value 2</option></select></div></div></div><div class="col-md-2"><br><button class="btn btn-sm btn-danger deleteRowAleart" > <i class="fa  fa-times"> </i> 	</button>   <button class="btn btn-sm btn-success addRowAleart"> <i class="fa fa-plus"> </i></button></div><br><br></div>';
			$("#rowsA").append(res);
			$('select').select2();

		});
		$(document).on("click", ".deleteRowAleart", function () {
			$(this).parent().parent().fadeOut();

		});

		var d = new Date();
		var month = d.getMonth() + 1;
		var day = d.getDate();
		var output = d.getFullYear() + '-' +
			(month < 10 ? '0' : '') + month + '-' +
			(day < 10 ? '0' : '') + day;
		$(".dateNow").val(output);
	</script>
 <script src="/assets/js/classie.js"></script>
 <script>
		var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
			showLeftPush = document.getElementById( 'showLeftPush' ),
			body = document.body;
			
		showLeftPush.onclick = function() {
			classie.toggle( this, 'active' );
			classie.toggle( body, 'cbp-spmenu-push-toright' );
			classie.toggle( menuLeft, 'cbp-spmenu-open' );
			disableOther( 'showLeftPush' );
		};
		

		function disableOther( button ) {
			if( button !== 'showLeftPush' ) {
				classie.toggle( showLeftPush, 'disabled' );
			}
	 }
	 $(function () {
		 $('.datetimepicker11').datetimepicker({
			 daysOfWeekDisabled: [0, 6]
		 });
	 });
	</script>
<!--//scrolling js-->
</body>
</html>