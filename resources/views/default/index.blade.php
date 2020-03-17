<!DOCTYPE html>
<html lang="en-US" dir="ltr" class="ltr">
    <head>
    <title>{!!@$TSeo['title']!!}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
 
      <meta name="author" content=" {!!@$TSeo['title']!!} "> 
    
       <meta name="description" content="{!!@$TSeo['description']!!}"> 
       <meta name="keywords" content="{!!@$TSeo['keyword']!!}"> 
    <meta name="Author" content="Newsun Plastic" />
 
    <meta property="article:publisher" content="https://www.facebook.com/">
    <link type="image/x-icon" rel="Shortcut Icon" href="/public/default/general/img/favicon.ico">

    <link rel="stylesheet" type="text/css" href="/public/default/general/library/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/public/default/general/library/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="/public/default/general/library/flexslider/flexslider.min.css">
    <link rel="stylesheet" type="text/css" href="/public/default/general/library/swipebox/css/swipebox.min.css">
    <link rel="stylesheet" type="text/css" href="/public/default/general/library/slick/slick.min.css">
    <link rel="stylesheet" type="text/css" href="/public/default/general/library/slick/slick-theme.min.css">
    <link rel="stylesheet" type="text/css" href="/public/default/general/css/animate.css">
    <link rel="stylesheet" type="text/css" href="/public/default/general/library/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="/public/default/general/library/pageloading/css/component.min.css">

    <link rel="stylesheet" type="text/css" href="/public/default/general/fonts/font-icon/style.css">
    
    <link rel="stylesheet" type="text/css" href="/public/default/general/css/elements.css">
    <link rel="stylesheet" type="text/css" href="/public/default/general/css/extra.css">
    <link rel="stylesheet" type="text/css" href="/public/default/general/css/widget.css">
    <link rel="stylesheet" type="text/css" href="/public/default/general/css/default.css">
    <link rel="stylesheet" type="text/css" href="/public/default/general/css/responsive.css">
   
    @yield('css')
  </head>
    <body>
    <div id="pagewrap" class="pagewrap">
        <div id="html-content" class="wrapper-content">
            @include("default.main.header")
            
            @yield('contents')
            @include("default.main.footer")
            <a id="totop" href="#" class="animated zoomIn"><i class="fa fa-angle-double-up"></i></a>
        </div>
    </div>
    <!-- jQuery-->
    <script src="/public/default/general/library/jquery-1.10.2.min.js"></script>
     <!-- Script Loading Page-->
     <script src="/public/default/general/library/html5shiv.js"></script>
     <script src="/public/default/general/library/respond.min.js"></script>
     <script src="/public/default/general/library/pageloading/js/snap.svg-min.js"></script>
     <script src="/public/default/general/library/pageloading/sidebartransition/js/modernizr.custom.js"></script>
    <!-- Bootstrap JavaScript-->
    <script src="/public/default/general/library/bootstrap/js/bootstrap.min.js"></script>
    <!-- library-->
    <script src="/public/default/general/library/flexslider/jquery.flexslider-min.js"></script>
    <script src="/public/default/general/library/swipebox/js/jquery.swipebox.min.js"></script>
    <script src="/public/default/general/library/slick/slick.min.js"></script>
    <script src="/public/default/general/library/isotope/isotope.pkgd.min.js"></script>
    <script src="/public/default/general/library/jquery-appear/jquery.appear.min.js"></script>
    <script src="/public/default/general/library/parallax/parallax.min.js"></script>
    <script src="/public/default/general/library/audiojs/audio.min.js"></script>
    <script src="/public/default/general/library/pageloading/js/svgLoader.min.js"></script>
    <script src="/public/default/general/library/pageloading/js/classie.min.js"></script>
    <script src="/public/default/general/library/pageloading/sidebartransition/js/sidebarEffects.min.js"></script>
    <script src="/public/default/general/library/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="/public/default/general/library/wowjs/wow.min.js"></script>
    <script src="/public/default/general/library/skrollr.min.js"></script>
    <script src="/public/default/general/library/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="/public/default/general/library/jquery-cookie/js.cookie.js"></script>
    <script src="/public/default/general/library/elements.js"></script>
    <script src="/public/default/general/library/widget.js"></script>
   
    @yield('js')

  </body>
</html>