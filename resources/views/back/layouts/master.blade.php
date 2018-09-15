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
    <link href="{{asset('back-theme/admin/sb-admin-2.css')}}" rel="stylesheet">


</head>

<body style="font-family:cairo;">
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{asset('login')}}">لوحة التحكم</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-left">
                <!-- /.dropdown -->
                
@guest
	@else
	<li class="dropdown">
    <!-- Auth::user()->role_id -->
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
	<i class="glyphicon glyphicon-user"></i> {{ Auth::user()->name  }} <span class="caret"></span>
	</a>
    
    

	<ul class="dropdown-menu" style="font-size:12px;">
	
    
    <li style="padding:5px;">
		<a href="{{ asset('admin/users/changepassword') }}">
		<i class="glyphicon glyphicon-lock"></i> تغيير كلمة المرور</a>
	</li>
    
    
    <li style="padding:5px;">
	<a href="{{ route('logout') }}"
	onclick="event.preventDefault();
	document.getElementById('logout-form').submit();">
	<i class="glyphicon glyphicon-log-out"></i> تسجيل خروج</a>

	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	{{ csrf_field() }}
	</form>
	</li>
    
    
    
    
    
	</ul>
	</li>
@endguest
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
   
   @guest
   @else
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
       
         @php             
         $links = DB::table('links')
                  ->join('admin_link', 'links.id', '=', 'admin_link.link_id')
                  ->where('links.parent_id', '=', 0)
                  ->where('links.showinmenu', '=', 1)
                  ->where('admin_link.user_id', '=', auth::user()->id)
                  ->get();     
         @endphp 
                                     
		@foreach($links as $link)        
        
            	<li>
                 <a href="{{asset($link->url)}}" style="background:#999; color:#FFF; font-size:16px;">
                 <i class="glyphicon {{$link->icon}}"></i> {{$link->title}}<span class="fa arrow"></span></a>
                 <ul class="nav nav-second-level">
                 
                  @php             
                  $sublinks = DB::table('links')
                  ->join('admin_link', 'links.id', '=', 'admin_link.link_id')
                  ->where('links.parent_id', '=', $link->id)
                  ->where('links.showinmenu', '=', 1)
                  ->where('admin_link.user_id', '=', auth::user()->id)
                  ->get();     
                 @endphp 
                 
                 @foreach($sublinks as $sublink)  
                 <li>
                    <a href="{{asset($sublink->url)}}"><i class="glyphicon {{$sublink->icon}}"></i> {{$sublink->title}}</a>
                 </li>
                 @endforeach   
                    
                  </ul>
                 </li>
                       
        @endforeach     
          
                           
                                
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
   @endguest         
            
            <!-- /.navbar-static-side -->
        </nav>

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
