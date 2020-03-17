
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,AngularJS,Angular,Angular2,Angular 2,Angular4,Angular 4,jQuery,CSS,HTML,RWD,Dashboard,React,React.js,Vue,Vue.js">
    <link rel="shortcut icon" href="img/favicon.png">
    <title> @yield('title','Backend - Unlock')	</title>

    <!-- Icons -->
    <link href="/public/admin/css/font-awesome.min.css" rel="stylesheet">
    <link href="/public/admin/css/simple-line-icons.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Main styles for this application -->
    <link href="/public/admin/css/style.css" rel="stylesheet">
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
   	
	@include("admin.main.header")


    <div class="app-body">
    	 <!-- SIDE -->
        @include("admin.main.side")

        <!-- Main content -->
       
          <main class="main">
          	@yield('content')
           
           </main>

    </div>

    

    @include("admin.main.footer")
</body>

</html>