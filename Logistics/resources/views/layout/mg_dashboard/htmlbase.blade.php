<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @section('Title')
    <title>Management Dashboard</title>
    @show

    <!-- Favicon-->
    @section('Favicon')
    <!-- <link rel="icon" href="favicon.ico" type="image/x-icon"> -->
     <link rel="shortcut icon" type="image/x-icon" href="{{url()}}/assets/favicon/favicon.ico" />
    @show

    @section('FontAwesome')
    <link rel="stylesheet" href="{{url()}}/assets/libs/font-awesome/css/font-awesome.min.css">
    @show


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{url()}}/assets/mg_dashboard/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{url()}}/assets/mg_dashboard/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{url()}}/assets/mg_dashboard/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{url()}}/assets/mg_dashboard/css/style.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="{{url()}}/assets/mg_dashboard/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{url()}}/assets/mg_dashboard/css/themes/all-themes.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{url()}}/assets/vendor/css/management.css">

    @yield('CSS')

</head>

<body class="theme-red">
    <!-- Page Loader -->
     <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->

    <!-- SPEEDO METER WIDGET -->
    <SPEEDOMETER hidden>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 speedometer_obj">
            <div class="card" style="cursor: pointer;">
                <div class="header">
                    <h5 style="margin: 0 0;">LTRPM</h5>
                    <ul class="header-dropdown" style="top: 7px; right: 10px;">
                        <li>
                            <a href="javascript:void(0);" style="text-decoration: none; color: #5a5a5a;">
                                <span class="value m-r-10" style="font-size: 23px;">0%</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <i class="material-icons">keyboard_arrow_right</i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="speedometer" style="margin-top: -20px;">FusionCharts will render here</div>
                    <span class="text">Sample Name</span>
                </div>
            </div>
        </div>
    </SPEEDOMETER>
    <!-- SPEEDO METER WIDGET END -->


    <!-- Top Bar -->
    @include('layout.mg_dashboard.header')
    <!-- Top Bar End-->

    <!-- Left & Right Sidebars -->
    <section>
        @include('layout.mg_dashboard.left_sidebar')
         {{-- @include('layout.mg_dashboard.right_sidebar') --}}
    </section>
    <!-- Left & Right Sidebars end-->
    <section>
        <div class="row page_title">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" align="left">
                  @yield('pageBackLink')
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 pageName" align="center">
                  @yield('currentPageName')
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" align="left">
                  @yield('downloadLink')
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            @yield('Content')
        </div>
    </section>



    <!-- Jquery Core Js -->
    <script src="{{url()}}/assets/mg_dashboard/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{url()}}/assets/mg_dashboard/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="{{url()}}/assets/mg_dashboard/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{url()}}/assets/mg_dashboard/jquery-slimscroll/jquery.slimscroll.js"></script> 

    <!-- Waves Effect Plugin Js -->
    <script src="{{url()}}/assets/mg_dashboard/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{url()}}/assets/mg_dashboard/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="{{url()}}/assets/mg_dashboard/raphael/raphael.min.js"></script>
    <script src="{{url()}}/assets/mg_dashboard/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="{{url()}}/assets/mg_dashboard/chartjs/Chart.bundle.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{url()}}/assets/mg_dashboard/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="{{url()}}/assets/mg_dashboard/js/admin.js"></script>

    <script type="text/javascript">
        ;(function(){
            var $body = $('body');
            var $overlay = $('.overlay');

            $('.navbar .navbar-header .nav-bar-icon, .overlay').on('click', function (e) {
                e.preventDefault();
                if ($('.sidebar').hasClass('closed')) {
                    $('.sidebar').css({'margin-left': '0px'});
                    $('.sidebar').removeClass('closed')
                    $('.overlay').show();
                    $('.navbar .navbar-header .nav-bar-icon').find('.material-icons').text('close');
                }else{
                    $('.sidebar').css({'margin-left': '-300px'});
                    $('.sidebar').addClass('closed')
                    $('.overlay').hide();
                    $('.navbar .navbar-header .nav-bar-icon').find('.material-icons').text('reorder');
                }
            });
            /*$('.overlay').click(function(){

            });*/
        }());

        function toTitleCase(str)
        {
            return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
        }

        function getcolorcode(value) {
            value = parseInt(value);
            if (value < 25) {
                return "#e44a00";
            }else if(value >= 25 && value <= 75){
                return "#f8bd19";
            }else {
                return "#6baa01";
            }
        }

        function getcolorcodeForCommitment(value){
            value = parseInt(value);
            if (value == 0) {
                return "#6baa01";
            }else if(value > 0 && value < 10){
                return "#f8bd19";
            }else {
                return "#e44a00";
            }
        }
        
        function getOTDcolorcode(value) {
            if ( value == '0' ) {
                return "#6baa01";
            } else {
                return "#e44a00";
            }
        }
    </script>

    @yield('JS')

</body>

</html>