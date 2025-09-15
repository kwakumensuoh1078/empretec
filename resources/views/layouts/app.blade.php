@php

    $staff_query = DB::select('SELECT * FROM staff WHERE staff_id = :id', ['id' => auth()->user()->staff_id]);

    $userCat = auth()->user()->user_cat;
    $links = DB::select('SELECT user_links.link_id, user_links.page_id,user_links.page_id_sub, user_links.link_url, user_links.link_name, user_links.link_image, user_links.link_parent FROM user_cat_links INNER JOIN user_links ON user_cat_links.link_id = user_links.link_id WHERE user_cat_links.cat_id = :id ORDER BY user_links.link_name ASC',['id' => $userCat]);
    $parents = array();
    $child = array();
    foreach ($links as $row_links) {
        if ($row_links->link_parent == 0) {
            $parents[] = $row_links;
        } else {
            $child[] = $row_links;
        }
    }
@endphp
<!DOCTYPE html>
<html lang="en" data-layout-mode="light_mode">


<!-- Mirrored from dreamspos.dreamstechnologies.com/html/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Jul 2025 18:54:25 GMT -->
<head>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Environmental Protection Agency.">
	<meta name="keywords" content="Environmental Protection Agency">
	<meta name="author" content="Indexcom Ltd">
	<meta name="robots" content="index, follow">
	<title>Environmental Protection Agency</title>

	<script src="{{asset('assets/js/theme-script.js')}}" type="da66958c310097099013dd7e-text/javascript"></script>	

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/logo-png.png')}}">

	<!-- Apple Touch Icon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/img/apple-touch-icon.png')}}">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<!-- Wizard CSS -->
     <link rel="stylesheet" href="{{asset('assets/plugins/twitter-bootstrap-wizard/form-wizard.css')}}">

	  
	<!-- Datatable CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap5.min.css')}}">

	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">

	<!-- animation CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
            <!-- Feather CSS -->
	<link rel="stylesheet" href="{{asset('assets/plugins/icons/feather/feather.css')}}">

    <!-- Pe7 CSS -->
		<link rel="stylesheet" href="{{asset('assets/plugins/icons/flags/flags.css')}}">
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">

	<!-- Daterangepikcer CSS -->
	<link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">

	<!-- Tabler Icon CSS -->
	<link rel="stylesheet" href="{{asset('assets/plugins/tabler-icons/tabler-icons.min.css')}}">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">

	<!-- Color Picker Css -->
	<link rel="stylesheet" href="{{asset('assets/plugins/%40simonwep/pickr/themes/nano.min.css')}}">

	<!-- Main CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/datatable.css')}}">
 
	@yield('css')
 
 


</head>

<body>
	<div id="global-loader">
		<div class="whirly-loader"> </div>
	</div>
	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<!-- Header -->
		<div class="header">
			<div class="main-header">
				<!-- Logo -->
				<div class="header-left active">
					<a href="{{route('dashboard')}}" class="logo logo-normal">
						<img src="{{asset('assets/img/EPA-top-logo.png')}}" alt="Img">
					</a>
					<a href="{{route('dashboard')}}" class="logo logo-white">
						<img src="{{asset('assets/img/EPA-top-logo.png')}}" alt="Img">
					</a>
					<a href="{{route('dashboard')}}" class="logo-small">
						<img src="{{asset('assets/img/logo-png.png')}}" alt="Img">
					</a>
				</div>
				<!-- /Logo -->
				<a id="mobile_btn" class="mobile_btn" href="#sidebar">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</a>

				<!-- Header Menu -->
				<ul class="nav user-menu">

					<!-- Search -->
					<li class="nav-item nav-searchinputs">
						<div class="top-nav-search">
							<a href="javascript:void(0);" class="responsive-search">
								<i class="fa fa-search"></i>
							</a>
						 
						</div>
					</li>
					<!-- /Search -->

					<!-- Select Store -->
				 
					<!-- /Select Store -->
 
				 
                    <li class="nav-item dropdown link-nav">
						<a href="javascript:void(0);" class="btn btn-primary btn-md d-inline-flex align-items-center" data-bs-toggle="dropdown">
							<i class="ti ti-calendar me-1"></i>{{ \Carbon\Carbon::now()->format('l, F j, Y g:i A') }}
						</a>
                    </li>
					
					<!-- Flag -->
					<li class="nav-item dropdown has-arrow flag-nav nav-item-box">
						 
							<i class="flag flag-gh"></i>
						</a>
						 
					</li>
					<!-- /Flag -->

					<li class="nav-item nav-item-box">
						<a href="javascript:void(0);" id="btnFullscreen">
							<i class="ti ti-maximize"></i>
						</a>
					</li>
					<li class="nav-item nav-item-box">
						<a href="#">
							<i class="ti ti-mail"></i>
							<span class="badge rounded-pill">1</span>
						</a>
					</li>
					<!-- Notifications -->
					<li class="nav-item dropdown nav-item-box">
						<a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
							<i class="ti ti-bell"></i>
						</a>
						<div class="dropdown-menu notifications">
							<div class="topnav-dropdown-header">
								<h5 class="notification-title">Notifications</h5>
								<a href="javascript:void(0)" class="clear-noti">Mark all as read</a>
							</div>
							<div class="noti-content">
								<ul class="notification-list">
									<li class="notification-message">
										<a href="activities.html">
											<div class="media d-flex">
												<span class="avatar flex-shrink-0">
													<img alt="Img" src="assets/img/profiles/avatar-13.jpg">
												</span>
												<div class="flex-grow-1">
													<p class="noti-details"><span class="noti-title">James Kirwin</span> confirmed his order.  Order No: #78901.Estimated delivery: 2 days</p>
													<p class="noti-time">4 mins ago</p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="activities.html">
											<div class="media d-flex">
												<span class="avatar flex-shrink-0">
													<img alt="Img" src="assets/img/profiles/avatar-03.jpg">
												</span>
												<div class="flex-grow-1">
													<p class="noti-details"><span class="noti-title">Leo Kelly</span> cancelled his order scheduled for  17 Jan 2025</p>
													<p class="noti-time">10 mins ago</p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="activities.html" class="recent-msg">
											<div class="media d-flex">
												<span class="avatar flex-shrink-0">
													<img alt="Img" src="assets/img/profiles/avatar-17.jpg">
												</span>
												<div class="flex-grow-1">
													<p class="noti-details">Payment of $50 received for Order #67890 from <span class="noti-title">Antonio Engle</span></p>
													<p class="noti-time">05 mins ago</p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="activities.html" class="recent-msg">
											<div class="media d-flex">
												<span class="avatar flex-shrink-0">
													<img alt="Img" src="assets/img/profiles/avatar-02.jpg">
												</span>
												<div class="flex-grow-1">
													<p class="noti-details"><span class="noti-title">Andrea</span> confirmed his order.  Order No: #73401.Estimated delivery: 3 days</p>
													<p class="noti-time">4 mins ago</p>
												</div>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="topnav-dropdown-footer d-flex align-items-center gap-3">
								<a href="#" class="btn btn-secondary btn-md w-100">Cancel</a>
								<a href="activities.html" class="btn btn-primary btn-md w-100">View all</a>
							</div>
						</div>
					</li>
					<!-- /Notifications -->

					<li class="nav-item nav-item-box">
						<a href=""><i class="ti ti-settings"></i></a>
					</li>
					<li class="nav-item dropdown has-arrow main-drop profile-nav">
						<a href="javascript:void(0);" class="nav-link userset" data-bs-toggle="dropdown">
							<span class="user-info p-0">
								<span class="user-letter">
									<img src="assets/img/profiles/avator1.jpg" alt="Img" class="img-fluid">
								</span>
							</span>
						</a>
						<div class="dropdown-menu menu-drop-user">
							<div class="profileset d-flex align-items-center">
								 
								<div>
									<h6 class="fw-medium">{{auth()->user()->name}}</h6>
									<p>{{auth()->user()->getUserCategory()}}</p>
								</div>
							</div>
							<a class="dropdown-item" href="profile.html"><i class="ti ti-user-circle me-2"></i>MyProfile</a>
							<a class="dropdown-item" href="sales-report.html"><i class="ti ti-file-text me-2"></i>Reports</a>
							<a class="dropdown-item" href="general-settings.html"><i class="ti ti-settings-2 me-2"></i>Settings</a>
							<hr class="my-2">
                            <form action="{{ route('logout-authentication-process') }}" method="POST">
									@csrf
							<button type="submit" class="dropdown-item logout pb-0" href="signin.html"><i class="ti ti-logout me-2"></i>Logout</button>
                            </form>
						</div>
					</li>
				</ul>
				<!-- /Header Menu -->

				<!-- Mobile Menu -->
				<div class="dropdown mobile-user-menu">
					<a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
						aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="profile.html">My Profile</a>
						<a class="dropdown-item" href="general-settings.html">Settings</a>
						  <form action="{{ route('logout-authentication-process') }}" method="POST">
									@csrf
						<button type="submit" class="dropdown-item" href="signin.html">Logout</button>
						 </form>
					</div>
				</div>
				<!-- /Mobile Menu -->
			</div>
		</div>
		<!-- /Header -->

		<!-- Sidebar -->
		<div class="sidebar" id="sidebar">
			<!-- Logo -->
			<div class="sidebar-logo active">
				<a href="{{route('dashboard')}}" class="logo logo-normal">
					<img src="{{asset('assets/img/EPA-top-logo.png')}}" alt="Img">
				</a>
				<a href="{{route('dashboard')}}" class="logo logo-white">
					<img src="{{asset('assets/img/EPA-top-logo.png')}}" alt="Img">
				</a>
				<a href="{{route('dashboard')}}" class="logo-small">
					<img src="{{asset('assets/img/logo-png.png')}}" alt="Img">
				</a>
				<a id="toggle_btn" href="javascript:void(0);">
					<i data-feather="chevrons-left" class="feather-16"></i>
				</a>
			</div>
			<!-- /Logo -->
			 
		 
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li class="submenu-open">
							<h6 class="submenu-hdr">Main Menu</h6>
							<ul>
								<li>
									<a href="{{route('dashboard')}}" class="@if ($pageName == "dashboard") active  @endif"><i class="ti ti-layout-grid fs-16 me-2"></i><span>Dashboard</span> </a>
									 
								</li>
                                 @foreach ($parents as $parent)
								<li class="submenu" class="@if ($pageName == $parent->page_id) active  @endif">
									<a href="javascript:void(0);"><i class="{{$parent->link_image}} fs-16 me-2"></i><span>{{$parent->link_name}}</span><span class="menu-arrow"></span></a>
									<ul>
                                        @foreach ($child as $sub)
									   @if ($parent->link_id == $sub->link_parent)
										<li><a href="{{route($sub->link_url)}}" class="@if ($subpageName == $sub->page_id_sub) active @endif">{{ $sub->link_name}}</a></li>
									 
                                         @endif
									     @endforeach
									</ul>
								</li>
                                @endforeach
 
							</ul>
						</li> 
							  
					</ul>
					
				</div>
			</div>
		</div>
		<!-- /Horizontal Sidebar -->

	 
		<!-- Horizontal Sidebar -->
		<div class="sidebar sidebar-horizontal" id="horizontal-menu">
			<div id="sidebar-menu-3" class="sidebar-menu">
				<div class="main-menu">
					<ul class="nav-menu">
						<li >
							<a href="{{route('dashboard')}}" class="@if ($pageName == "dashboard") active  @endif"><i class="ti ti-layout-grid fs-16 me-2"></i><span> Dashboard</span> </a>
						 
						</li>
						 @foreach ($parents as $parent)
						<li class="submenu" class="@if ($pageName == $parent->page_id) active  @endif">
							
							<a href="javascript:void(0);"><i class="{{$parent->link_image}} fs-16 me-2"></i><span> 
								</span> <span class="menu-arrow"></span></a>
							<ul>
								 @foreach ($child as $sub)
									   @if ($parent->link_id == $sub->link_parent)
								<li><a href="{{route($sub->link_url)}}" class="@if ($subpageName == $sub->page_id_sub) active @endif"><span>{{ $sub->link_name}}</span></a></li>
							     @endif
								@endforeach
							</ul>
						</li>
						 @endforeach
					 
					</ul>
				</div>
			</div>
		</div>
		<!-- /Horizontal Sidebar -->

		<!-- Two Col Sidebar -->
		<div class="two-col-sidebar" id="two-col-sidebar">
			<div class="sidebar sidebar-twocol">
				<div class="twocol-mini">
					<div class="sidebar-left slimscroll">
						<div class="nav flex-column align-items-center nav-pills" id="sidebar-tabs" role="tablist"
							aria-orientation="vertical">
							<a href="#" class="nav-link active" title="Dashboard" data-bs-toggle="tab" data-bs-target="#dashboard">
								<i class="ti ti-smart-home"></i>
							</a>
								 @foreach ($parents as $parent)
							<a href="#" class="nav-link " title="{{$parent->link_name}}" data-bs-toggle="tab" data-bs-target="#{{$parent->link_id}}">
								<i class="{{$parent->link_image}}"></i>
							</a>
							 @endforeach 
						</div>
					</div>
				</div>
				<div class="sidebar-right">
					<!-- Logo -->
					<div class="sidebar-logo">
						<a href="{{route('dashboard')}}" class="logo logo-normal">
							<img src="assets/img/EPA-top-logo.png" alt="Img">
						</a>
						<a href="{{route('dashboard')}}" class="logo logo-white">
							<img src="assets/img/EPA-top-logo.png" alt="Img">
						</a>
						<a href="{{route('dashboard')}}" class="logo-small">
							<img src="assets/img/logo-png.png" alt="Img">
						</a>
					</div>
					 
					<!-- /Logo -->
					<div class="sidebar-scroll">
						<div class="text-center rounded bg-light p-3 mb-3 border">
							<div class="avatar avatar-lg online mb-3">
								<img src="assets/img/customer/customer15.jpg" alt="Img" class="img-fluid rounded-circle">
							</div>
							<h6 class="fs-14 fw-bold mb-1">{{auth()->user()->name}}</h6>
							<p class="fs-12 mb-0">{{auth()->user()->getUserCategory()}}</p>
						</div>
						<div class="tab-content" id="v-pills-tabContent">
							<div class="tab-pane fade show active" id="dashboard">
								<ul>
									<li class="menu-title"><span>MAIN</span></li>
									<li><a  href="{{route('dashboard')}}" class="@if ($pageName == "dashboard") active  @endif">Admin Dashboard</a></li>
									 
								</ul>
							</div>
							 @foreach ($parents as $parent)
							<div class="tab-pane fade" id="{{$parent->link_id}}">
								<ul>
									 <li class="menu-title"><span>SUB MENU</span></li>
									 @foreach ($child as $sub)
									   @if ($parent->link_id == $sub->link_parent)
									   <li><a href="{{route($sub->link_url)}}" class="@if ($subpageName == $sub->page_id_sub) active @endif">{{ $sub->link_name}}</a></li>
									  
									@endif
							       @endforeach
								</ul>
							</div>
							 @endforeach 
					 
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Two Col Sidebar -->

		<div class="page-wrapper">
		 
                @yield('content')
				
	 
			<div class="copyright-footer d-flex align-items-center justify-content-between border-top bg-white gap-3 flex-wrap">
				<p class="fs-13 text-gray-9 mb-0"> 2025 &copy; Environmental Protection Agency All Right Reserved</p>
				<p>Designed & Developed By <a href="javascript:void(0);" class="link-primary">Indexcom Ltd</a></p>
			</div>
		</div>

	</div>
	<!-- /Main Wrapper -->

 
	<!-- jQuery -->
	<script src="{{asset('assets/js/jquery-3.7.1.min.js')}}" type="da66958c310097099013dd7e-text/javascript"></script>

	<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}" ></script>

	<!-- Feather Icon JS -->
	<script src="{{asset('assets/js/feather.min.js')}}" type="da66958c310097099013dd7e-text/javascript"></script>

	<!-- Slimscroll JS -->
	<script src="{{asset('assets/js/jquery.slimscroll.min.js')}}" type="da66958c310097099013dd7e-text/javascript"></script>

	<!-- Datatable JS -->
	<script src="{{ asset('assets/js/jquery.dataTables.min.js')}}" type="7ab17edb451f901b9dfb4717-text/javascript"></script>
	<script src="{{ asset('assets/js/dataTables.bootstrap5.min.js')}}" type="7ab17edb451f901b9dfb4717-text/javascript"></script>


	<!-- Bootstrap Core JS -->
	<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}" type="da66958c310097099013dd7e-text/javascript"></script>

	<!-- ApexChart JS -->
	<script src="{{asset('assets/plugins/apexchart/apexcharts.min.js')}}" type="da66958c310097099013dd7e-text/javascript"></script>
	<script src="{{asset('assets/plugins/apexchart/chart-data.js')}}" type="da66958c310097099013dd7e-text/javascript"></script>

	<!-- Chart JS -->
	<script src="{{asset('assets/plugins/chartjs/chart.min.js')}}" type="da66958c310097099013dd7e-text/javascript"></script>
	<script src="{{asset('assets/plugins/chartjs/chart-data.js')}}" type="da66958c310097099013dd7e-text/javascript"></script>

	<!-- Daterangepikcer JS -->
	<script src="{{asset('assets/js/moment.min.js')}}" type="da66958c310097099013dd7e-text/javascript"></script>
	<script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}" type="da66958c310097099013dd7e-text/javascript"></script>

	<!-- Select2 JS -->
	<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}" type="da66958c310097099013dd7e-text/javascript"></script>

	

	<!-- Color Picker JS -->
	<script src="{{asset('assets/plugins/%40simonwep/pickr/pickr.es5.min.js')}}" type="da66958c310097099013dd7e-text/javascript"></script>

        <!-- Feather Icon JS -->
    <script src="{{asset('assets/js/feather.min.js')}}" type="3bb0267ac42e367a8a8ce41d-text/javascript"></script>

	<!-- Custom JS -->
	<script src="{{asset('assets/js/theme-colorpicker.js')}}" type="da66958c310097099013dd7e-text/javascript"></script>
	<script src="{{asset('assets/js/script.js')}}" type="da66958c310097099013dd7e-text/javascript"></script>
	<script src="{{asset('assets/js/datatable.js')}}"></script>

		<!-- Wizard JS -->
		<script src="{{asset('assets/plugins/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}" type="a317a1ec46a9f5ed5f9ec2be-text/javascript"></script>
		<script src="{{asset('assets/plugins/twitter-bootstrap-wizard/prettify.js')}}" type="a317a1ec46a9f5ed5f9ec2be-text/javascript"></script>
		<script src="{{asset('assets/plugins/twitter-bootstrap-wizard/form-wizard.js')}}" type="a317a1ec46a9f5ed5f9ec2be-text/javascript"></script>

	
	
<script src="{{asset('cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js')}}" data-cf-settings="da66958c310097099013dd7e-|49" defer></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"961c6d5ae94a9334","version":"2025.7.0","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
 </script>
 @yield('scripts')
</body>


<!-- Mirrored from dreamspos.dreamstechnologies.com/html/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Jul 2025 18:55:51 GMT -->
</html>