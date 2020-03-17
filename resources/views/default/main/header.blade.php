 <header class="header-transparent">
                <div class="header-top top-layout-02">
                    <div class="container">
                        <div class="topbar-left">
                            <div class="topbar-content">
                                <div class="item">
                                    <div class="wg-contact"><i class="fa fa-map-marker"></i><span>{{$TGeneral['address']}}</span></div>
                                </div>
                                <div class="item">
                                    <div class="wg-contact"><i class="fa fa-phone"></i><span>{{$TGeneral['phone']}}</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="topbar-right">
                            <div class="topbar-content">
                                <div class="item">
                                    <ul class="socials-nb list-inline wg-social">
                                        <li><a href="{{$TSocial['facebook']}}" target="_black" title="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="{{$TSocial['twitter']}}" target="_black" title="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="{{$TSocial['pinterest']}}" target="_black" title="#"><i class="fa fa-pinterest"></i></a></li>
                                        <li><a href="{{$TSocial['google']}}" target="_black" title="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-main">
                    <div class="container">
                        <div class="open-offcanvas">&#9776;</div>
                        <div class="utility-nav">
                            <div class="dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="search-bar dropdown-toggle"><i class="fa fa-search"></i></a>
                                <div class="dropdown-menu">
                                    <div class="search-form">
                                       {!!Form::open(['method'=>'get','url'=>'/search'])!!}
                                            <div class="input-group">
                                                <input type="text" placeholder="Search" class="form-control" name="search">
                                                <button class="input-group-addon" type="submit"><i class="fa fa-search"></i></button>
                                            </div>
                                        {!!Form::close()!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="header-logo">
                            <a href="/" class="logo logo-static" title="#">
                                <img src="/public/upload/news/logo.png" alt="#" class="logo-img">
                            </a>
                            <a href="/" class="logo logo-fixed" title="#">
                                <img src="/public/default/general/img/logo-2.png" alt="#" class="logo-img"></a>
                        </div>
                        <nav id="main-nav-offcanvas" class="main-nav-wrapper">
                            <div class="close-offcanvas-wrapper"><span class="close-offcanvas">x</span></div>
                            <div class="main-nav">
                                <ul id="main-nav" class="nav nav-pills">
                                    <li class="dropdown">
                                        <a href="/" class="dropdown-toggle" title="#">Home</a>
                                    </li>
                                    <li><a href="/about-us" title="About">About</a></li>
                                    <li class="dropdown">
                                        <a href="/product" title="Product">Product</a>
                                        @if(@TCate)
                                        <ul class="dropdown-menu">
                                            @foreach($TCate as $cate)
                                            <li><a href="/{{$cate['alias']}}">{{$cate['name']}}</a></li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    
                                    <li><a href="/news" title="news">News</a></li>
                                    <li><a href="/contact" title="contact">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </header>