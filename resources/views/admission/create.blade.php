<!DOCTYPE html>
<html lang="en">


<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />

	<!-- DESCRIPTION -->
	<meta name="description" content="EduChamp : Education HTML Template" />

	<!-- OG -->
	<meta property="og:title" content="EduChamp : Education HTML Template" />
	<meta property="og:description" content="EduChamp : Education HTML Template" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">

	<!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}" />

	<!-- PAGE TITLE HERE ============================================= -->
	<title>EduChamp : Education HTML Template </title>

	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->

    <!-- General CSS Files -->
    {{----------------------------- ALERT STARTS HERE ---------------------------}}

    {{-- <link rel="stylesheet" href="{{ asset('alert/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('alert/assets/modules/fontawesome/css/all.min.css') }}">


    <link rel="stylesheet" href="{{ asset('alert/assets/modules/izitoast/css/iziToast.min.css') }}">


    <link rel="stylesheet" href="{{ asset('alert/assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('alert/assets/css/components.min.css') }}"> --}}

    {{----------------------------- ALERT ENDS HERE ---------------------------}}



	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/assets.css') }}">

	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/typography.css') }}">

	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/shortcodes/shortcodes.css') }}">

	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
	<link class="skin" rel="stylesheet" type="text/css" href="{{ asset('assets/css/color/color-1.css') }}">

</head>
<body id="bg">
<div class="page-wraper">
	<div id="loading-icon-bx"></div>
	<div class="account-form">
		<div class="account-head" style="background-image:url(assets/images/background/bg2.jpg);">
			<a href="index.html"><img src="{{ asset('assets/images/logo-white-2.png') }}" alt=""></a>
		</div>
        {{-- <div class="col-12 col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-2">Success Message</div>
                    <button class="btn btn-primary" id="toastr-2">Launch</button>
                </div>
            </div>
        </div> --}}
		<div class="account-form-inner">
			<div class="account-container">
				<div class="heading-bx left">
					<h2 class="title-head">ADMISSION <span>PORTAL</span></h2>
					{{-- <p>Don't have an account? <a href="register.html">Create one here</a></p> --}}
				</div>

				<form class="contact-bx" action="{{ route('admission.store') }}" id="company-form" method="POST" enctype="multipart/form-data">
                    @csrf

					<div class="row placeani">
                        <input type="text" name="username" id="username" value="{{ $rand_username_password }}" class="form-control">
                            <input type="text" name="password" id="password" value="{{ $rand_username_password }}" class="form-control">

						<div class="col-lg-6">
							<div class="form-group">
								<div class="input-group">
									<label>First Name</label>
									<input name="first_name" type="text" required="" class="form-control">
								</div>
							</div>
						</div>

                        <div class="col-lg-6">
							<div class="form-group">
								<div class="input-group">
									<label>Last Name</label>
									<input name="last_name" type="text" required="" class="form-control">
								</div>
							</div>
						</div>

                        <div class="col-lg-6">
							<div class="form-group">
								<div class="input-group">
									<label>Phone</label>
									<input name="phone" type="number" required="" class="form-control">
								</div>
							</div>
						</div>

                        <div class="col-lg-6">
							<div class="form-group">
								<div class="input-group">
									<label>Email</label>
									<input name="email" type="text" required="" class="form-control">
								</div>
							</div>
						</div>

                        <div class="col-lg-6">
							<div class="form-group">
								<div class="input-group">
									<label>Date Of Birth</label>
									<input name="dob" type="date" required="" class="form-control">
								</div>
							</div>
						</div>

                        <div class="col-lg-6">
							<div class="form-group">
								<div class="input-group">
									<label>Local Of Origin</label>
									<input name="localOfOrigin" type="text" required="" class="form-control">
								</div>
							</div>
						</div>

                        <div class="col-lg-6">
							<div class="form-group">
								<div class="input-group">
									<label>State Of Origin</label>
									<input name="stateOfOrigin" type="text" required="" class="form-control">
								</div>
							</div>
						</div>

                        <div class="col-lg-6">
							<div class="form-group">
								<div class="input-group">
									<label>Current Address</label>
									<input name="current_address" type="text" required="" class="form-control">
								</div>
							</div>
						</div>

                        <div class="col-lg-6">
							<div class="form-group">
								<div class="input-group">
									<label>Image</label>
									<input name="image" type="file" required="" class="form-control">
								</div>
							</div>
						</div>

                        <div class="col-lg-6">
							<div class="form-group">
								<div class="input-group">
									<label>Passport</label>
									<input name="passport" type="text" required="" class="form-control">
								</div>
							</div>
						</div>

                        <div class="col-lg-4">
							<div class="form-group">
								<div class="input-group">
									<label>Date Registered</label>
									<input name="dateregistered" type="date" required="" class="form-control">
								</div>
							</div>
						</div>

                        <div class="col-lg-4">
							<div class="form-group">
								<div class="input-group">
									<label>Roll No</label>
									<input name="roll_no" type="text" required="" class="form-control">
								</div>
							</div>
						</div>

                        <div class="col-lg-4">
							<div class="form-group">
								<div class="input-group">
									<label>Country</label>
									<input name="country" type="text" required="" class="form-control">
								</div>
							</div>
						</div>

                        <div class="col-lg-6 mt-3">
                            <label for="class_name"> Class </label>
                            <select class="form-control" name="class_name" required>
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 mt-3">
                            <label for="department_name"> Department</label>
                            <select class="form-control" name="department_name" required>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 mt-3">
                            <label for="faculty_name"> Faculty </label>
                            <select class="form-control" name="faculty_name" required>
                                @foreach($faculties as $faculty)
                                    <option value="{{ $faculty->id }}">{{ $faculty->faculty_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 mt-3">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender" required>
                                {{-- <option>Select Gender</option> --}}
                                    <option value="male">Male</option>
                                    <option value="female">FeMale</option>
                            </select>
                        </div>

                            <div class="col-lg-12 mt-4">
                                <div class="form-group form-forget">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                        <label class="custom-control-label" for="customControlAutosizing">Status</label>
                                    </div>
                                    {{-- <a href="forget-password.html" class="ml-auto">Forgot Password?</a> --}}
                                </div>
                            </div>

						<div class="col-lg-12 m-b30">
							<button name="submit" type="submit" value="Submit" class="btn button-md">Submit</button>
						</div>
						{{-- <div class="col-lg-12">
							<h6>Login with Social media</h6>
							<div class="d-flex">
								<a class="btn flex-fill m-r5 facebook" href="#"><i class="fa fa-facebook"></i>Facebook</a>
								<a class="btn flex-fill m-l5 google-plus" href="#"><i class="fa fa-google-plus"></i>Google Plus</a>
							</div>
						</div> --}}
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- External JavaScripts -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script>
<script src="{{ asset('assets/vendors/magnific-popup/magnific-popup.js') }}"></script>
<script src="{{ asset('assets/vendors/counter/waypoints-min.js') }}"></script>
<script src="{{ asset('assets/vendors/counter/counterup.min.js') }}"></script>
<script src="{{ asset('assets/vendors/imagesloaded/imagesloaded.js') }}"></script>
<script src="{{ asset('assets/vendors/masonry/masonry.js') }}"></script>
<script src="{{ asset('assets/vendors/masonry/filter.js') }}"></script>
<script src="{{ asset('assets/vendors/owl-carousel/owl.carousel.js') }}"></script>
<script src="{{ asset('assets/js/functions.js') }}"></script>
<script src="{{ asset('assets/js/contact.js') }}"></script>
<script src="{{ asset('assets/vendors/switcher/switcher.js') }}"></script>


{{-- <script src="{{ asset('alert/assets/bundles/lib.vendor.bundle.js') }}"></script>
<script src="{{ asset('alert/js/CodiePie.js') }}"></script>


<script src="{{ asset('alert/assets/modules/izitoast/js/iziToast.min.js') }}"></script>


<script src="{{ asset('alert/js/page/modules-toastr.js') }}"></script>


<script src="{{ asset('alert/js/scripts.js') }}"></script>
<script src="{{ asset('alert/js/custom.js') }}"></script> --}}

</body>

</html>
