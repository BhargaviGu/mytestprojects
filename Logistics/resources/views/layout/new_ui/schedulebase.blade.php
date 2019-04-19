<!DOCTYPE html>
<html>

<?php include(base_path().'/app/Modules/XogonetModule/tagname.php') ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @section('Title')
    <title>@yield('TITLE')</title>
    @show

    <!-- Favicon-->
    @section('Favicon')
    <!-- <link rel="icon" href="favicon.ico" type="image/x-icon"> -->
     <link rel="shortcut icon" type="image/x-icon" href="{{url()}}/assets/favicon/favicon.ico" />
    @show

    @section('FontAwesome')
    <link rel="stylesheet" href="{{url()}}/assets/libs/font-awesome/css/font-awesome.min.css?v={{$tag}}">
    @show

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{url()}}/assets/mg_dashboard/bootstrap/css/bootstrap.min.css?v={{$tag}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <!-- <link href="{{url()}}/assets/mg_dashboard/node-waves/waves.min.css?v={{$tag}}" rel="stylesheet" /> -->

    <!-- Animation Css -->
    <link href="{{url()}}/assets/mg_dashboard/animate-css/animate.min.css?v={{$tag}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{url()}}/assets/new_ui/css/style.css?v={{$tag}}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{url()}}/assets/vendor/css/new_app.css?v={{$tag}}">

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', '{{Session::get("gaId")}}', 'auto');
      ga('set', 'dimension1', '{{Session::get("userId")}}');
      ga('send', 'pageview');
    </script>

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
    
    <div class="scroll-to-top-div visible-lg visible-sm visible-md">
        <button type="button" class="btn btn-primary btn-circle-lg waves-effect waves-circle waves-float waves-light">
            <i class="fa fa-angle-up"></i>
        </button>
    </div>
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

    <!-- Top Bar -->
        @yield('HEADER')
    <!-- Top Bar End-->

    <!-- Left & Right Sidebars -->
    <section>
         @include('layout.new_ui.right_sidebar')
    </section>
    <!-- Left & Right Sidebars end-->


    <section class="content-main">
        <div class="container-fluid">
            <div class="row clearfix" style="margin-left: 0;margin-right: 0; margin-top: 0;">
                @if(Session::get('userType')=='supplier')
                    <div class="col-lg-5 col-md-4 col-sm-5 col-xs-10">
                        <h4 class="heading">@yield('PAGE_NAME')</h4>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 visible-lg visible-md visible-sm schedule text-right">
                        @yield('PAGE_DOWNLOAD')
                    </div>
                    <div class="col-xs-12 visible-xs schedule text-right">
                        @yield('PAGE_DOWNLOAD')
                    </div>
                    <!-- <div class="col-xs-2 visible-xs PAGE_DOWNLOAD" style="padding-left: 10px !important;">
                        @yield('PAGE_DOWNLOAD')
                    </div> -->
                @else
                    <div class="col-lg-5 col-md-4 col-sm-5 col-xs-9">
                        <h4 class="heading">@yield('PAGE_NAME')</h4>
                    </div>
                    <div class="col-lg-6 col-md-7 col-sm-6 visible-lg visible-md visible-sm schedule text-right">
                        @yield('PAGE_DOWNLOAD')
                    </div>
                    <div class="col-xs-1 visible-xs PAGE_FILTER">
                        @yield('PAGE_FILTER')
                    </div>
                    <div class="col-xs-12 visible-xs schedule text-right">
                        @yield('PAGE_DOWNLOAD')
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 visible-lg visible-md visible-sm PAGE_FILTER">
                        @yield('PAGE_FILTER')
                    </div>
                @endif
            </div>

            @yield('Content')
        </div>

        <div id="submitAllCOnfirm" class="modal fade" role="dialog">
            <div class="modal-dialog modal-sm">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="divName">
                        <h5>There are more docs which you haven't verified. You want to accept all anyway!</h5>
                    </div>
                    <div class="modal-footer">
                        <span class="lodingDiv" style="display: none"> Processing... </span>
                        <button type="button" class="btn btn-success btn-sm submitAllCOnfirmBtn">Proceed</button>
                        <button type="button" class="btn btn-warning btn-sm closeBtn" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="viewNotesModal">
            <div id = "notesModal" class="modal fade in" tabindex="0" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <img class="modal_note" style="background: white; -webkit-mask-box-image: url({{url()}}/assets/img/notes/notes_mobile.png)">
                    <span class="header">Notes</span>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                  </div>
                  <div class="modal-body notes-modal"></div>
                  <div class="modal-footer">
                    <textarea class="form-control" placeholder="Type message" maxlength="255"></textarea>
                    <button type="button" class="btn save">Save</button>
                  </div>
                </div>
              </div>
            </div>
        </div>

    </section>

    @yield('FOOTER')

    <script type="text/javascript">
        var apiurl= "{{url()}}";
        var NO_DATA_TEXT = "No Data Found to Display";
        var tag = "{{$tag}}";
        var lifetimeValue = "{{Session::get('session_lifetime')}}";
    </script>

    <!-- Jquery Core Js -->
    <script src="{{url()}}/assets/mg_dashboard/jquery/jquery.min.js?v={{$tag}}"></script>

    <script type="text/javascript">
        $('.active').parent('.item').css("border-top-color", "rgb(6, 119, 236)");
        $('.active').parent('.item').css("border-bottom-color", "rgb(6, 119, 236)");
        $('.active').css("color", "rgb(6, 119, 236)");
    </script>

    <!-- Bootstrap Core Js -->
    <script src="{{url()}}/assets/mg_dashboard/bootstrap/js/bootstrap.min.js?v={{$tag}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{url()}}/assets/mg_dashboard/bootstrap-select/js/bootstrap-select.min.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{url()}}/assets/mg_dashboard/jquery-slimscroll/jquery.slimscroll-min.js?v={{$tag}}"></script> 

    <!-- Waves Effect Plugin Js -->
    <!--<script src="{{url()}}/assets/mg_dashboard/node-waves/waves.min.js?v={{$tag}}"></script>-->

    <!-- Custom Js -->
    <script src="{{url()}}/assets/new_ui/js/admin-min.js?v={{$tag}}"></script>

    <script src="{{url()}}/assets/new_ui/js/demo-min.js?v={{$tag}}"></script>

    <script type="text/javascript" src="{{url()}}/assets/js/idle-timer-min.js?v={{$tag}}"></script>

    <!-- Common Javascript for entire applcation -->
    <script src="{{url()}}/assets/js/pages/xnet_common.js?v={{$tag}}"></script>
    
    @yield('JS')

</body>

</html>
