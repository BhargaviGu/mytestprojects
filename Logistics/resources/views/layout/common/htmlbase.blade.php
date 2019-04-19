<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  
  @section('Favicon')
  <link rel="shortcut icon" type="image/x-icon" href="{{url()}}/assets/favicon/favicon.ico" />
  @show

  @section('Title')
  <title>LSC</title>
  @show

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Cache-control" content="no-cache">
  <meta http-equiv="pragma" content="no-cache" />
  
  @section('Manifest')
  <link rel="manifest" href="{{url()}}/manifest.json">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="LSC">
  <link rel="apple-touch-icon" href="{{url()}}/images/icons/LSC.png">
  <meta name="msapplication-TileImage" content="{{url()}}/images/icons/LSC.png">
  <meta name="msapplication-TileColor" content="#2F3BA2">
  @show

  @section('CSSBootstrap')
  <link rel="stylesheet" href="{{url()}}/assets/libs/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{url()}}/assets/vendor/css/ie10-viewport-bug-workaround.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="{{url()}}/assets/vendor/css/styles.css">
  
  @show

  @section('FontAwesome')
  <link rel="stylesheet" href="{{url()}}/assets/libs/font-awesome/css/font-awesome.min.css">
  @show

  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700,700i,900" rel="stylesheet">
  <link rel="stylesheet" href="{{url()}}/assets/vendor/css/app.css">

  @section('GA')
  
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', '{{Session::get("gaId")}}', 'auto');
  ga('set', 'dimension1', '{{Session::get("userId")}}');
  ga('send', 'pageview');
  </script>

  @show
  
  @yield('BaseCSSLib')  
</head>
<body>

  @yield('BaseContent')

  <script type="text/javascript">
    var url="{{url()}}";
  </script>
  @section('JSJquery')
  <script src="{{url()}}/assets/libs/jquery/dist/jquery.min.js"></script>
  @show

  @section('PageLoader')
  <div class="loader" >
    <svg viewBox="0 0 32 32" width="32" height="32">
      <circle id="spinner" cx="16" cy="16" r="14" fill="none"></circle>
    </svg>
  </div>
  @stop
  
  @section('JSBootstrap')
  <script src="{{url()}}/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
  @show
  
  @yield('BaseJSLib')

</body>
</html>
