<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('back-theme/admin/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('front-theme/fonts/cairo/cairo.css')}}" rel="stylesheet">
    <link href="{{asset('back-theme/admin/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    
    

    <!-- Custom CSS -->


</head>

<body style="font-family:cairo;">
  
        <div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
<h2 class="page-title" style="margin-top:20px;">@yield('title')</h2>
@include('back.layouts.error_msg')
@yield('content')
                    
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			
			<!-- /.row -->
		</div>
	</div>
        <!-- /#page-wrapper -->

    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="{{asset('back-theme/admin/jquery-1.11.0.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('back-theme/admin/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('back-theme/admin/metisMenu.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('back-theme/admin/sb-admin-2.js')}}"></script>

  
    <!-- DataTables JavaScript -->
    <!--  <script src="admin/dataTables/jquery.dataTables.min.js"></script>
    <script src="admin/dataTables/dataTables.bootstrap.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <!--  <script>
        $(document).ready(function() {
          $('#dataTables-example').dataTable();
        });
    </script> -->

</body>

</html>
