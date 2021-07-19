<!DOCTYPE html>
<html lang="en">


<head>
    <title>EEducation Master Template</title>
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="EEducation master is one of the best eEducational html template, it's suitable for all eEducation websites like university,college,school,online eEducation,tution center,distance eEducation,computer eEducation">
    <meta name="keyword" content="eEducation html template, university template, college template, school template, online eEducation template, tution center template">
    <!-- FAV ICON(BROWSER TAB ICON) -->
    <link rel="shortcut icon" href="{{ asset('admin/images/fav.ico') }}" type="image/x-icon">
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CJosefin+Sans:600,700" rel="stylesheet">
    <!-- FONTAWESOME ICONS -->
    <link rel="stylesheet" href="{{ asset('admin/css/font-awesome.min.css') }}">
    <!-- ALL CSS FILES -->
    <link href="{{ asset('admin/css/materialize.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet" />
    <!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
    <link href="{{ asset('admin/css/style-mob.css') }}" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
    @stack('css')
</head>

<body>

    <!--== MAIN CONTRAINER ==-->
    <div class="wrapper">
        {{--------- TOP BAR ---------}}
        @include('layouts.backend.partials.topbar')


        <div class="container-fluid sb2">
            <div class="row">
                <div class="sb2-1">


                    @include('layouts.backend.partials.sidebar')

                </div>

                <div class="sb2-2">
                    <div class="sb2-2-2">
                        <ul>
                            <li><a href="index-2.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                            </li>
                            <li class="active-bre"><a href="#"> Dashboard</a>
                            </li>
                            <li class="page-back"><a href="index-2.html"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
                            </li>
                        </ul>
                    </div>

                    <div class="content-wrapper">
                        <main class="py-4">
                            @yield('content')
                        </main>
                    </div>

                    {{-- @include('layouts.backend.partials.footer') --}}
                </div>

            </div>
        </div>
    </div>

    <!--Import jQuery before materialize.js-->
    <script src="{{ asset('admin/js/main.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/materialize.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom.js') }}"></script>
    @stack('js')
</body>


</html>
