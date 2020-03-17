@extends('default.index')
@section("css")
     <link rel="stylesheet" type="text/css" href="/public/default/general/css/home.css">
@endsection
@section("js")
 <script src="/public/default/general/js/home.js"></script>
@endsection
@section('contents')
	 <div class="page-container">
                <div class="page-content-wrapper">
                    <section class="boximg_main">
                        <div class="img_maintop1 img_maintop">
                            <h1>
                                Think <span>Green </span>
                                and Live <span>Green</span>
                            </h1>
                            <div>
                                <img src="/public/default/general/img/img-main-top3.png" alt="#" class="animated5 fadeInRight">
                            </div>
                        </div>
                        <div class="img_maintop2 img_maintop">
                            <h3 class="animated6 fadeInDown">
                                INTERLEAVED <br /> DRAW TAPE BAG ON ROLL <br/> CONVERTING SYSTEM <br/> <span>
                                    (Commen Type for Long / Short Bags) 
                                </span>
                            </h3>
                            <div>
                                <img src="/public/default/general/img/img-main-center4.jpg" alt="#" class="animated5 fadeInUp">
                            </div>
                        </div>
                        <div class="img_maintop3 img_maintop">
                            <h2 class="animated7 fadeInLeft">
                                <span>The leading manufacturer of <br /> garbage bags in Viet nam</span>
                            </h2>
                            <div>
                                <img src="/public/default/general/img/img-main-bot3.png" alt="#" class="animated7 fadeInLeft">
                            </div>
                        </div>
                    </section>
                    <section class="team-section">
                        <div class="container">
                            <div class="row">
                            <div class="col-md-12">
                                <div class="swin-sc swin-sc-title">
                                <h3 class="title swin-btn center form-submit"><a href="/product" title="#">Main Product</a></h3>
                                </div>
                                <div class="swin-sc swin-sc-team-slider">
                                    @foreach($Product as $product)
                                    <div class="team-item swin-transition wow fadeInLeft">
                                        <div class="team-img-wrap item-style">
                                            <a class="team-img" href="/{{$product->Cate()->alias}}/{{$product['alias']}}" title="{{$product['name']}}">
                                                <img src="/public/upload/product/big/{{$product['picture']}}" alt="{{$product['name']}}" class="img img-responsive">
                                            </a>
                                        </div>
                                        <a class="team-name" href="/{{$product->Cate()->alias}}/{{$product['alias']}}" title="{{$product['name']}}">{{$product['name']}}</a>
                                        <hr>
                                    </div>
                                   @endforeach
                                </div>
                            </div>
                            </div>
                        </div>
                        </section>
                </div>
            </div>
           <div id="loader" data-opening="m -5,-5 0,70 90,0 0,-70 z m 5,35 c 0,0 15,20 40,0 25,-20 40,0 40,0 l 0,0 C 80,30 65,10 40,30 15,50 0,30 0,30 z" class="pageload-overlay">
                <div class="loader-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 80 60" preserveaspectratio="none">
                        <path d="m -5,-5 0,70 90,0 0,-70 z m 5,5 c 0,0 7.9843788,0 40,0 35,0 40,0 40,0 l 0,60 c 0,0 -3.944487,0 -40,0 -30,0 -40,0 -40,0 z"></path>
                    </svg>
                    <div class="sk-circle" style="background:#fff url('/public/upload/news/{{$TGeneral['picture']}}') no-repeat center top;background-size: auto 100%;">
                        <img src="/public/default/general/img/loading_spinner.gif" class="loadsecond" alt="Image second" />
                    </div>
                </div>
            </div>
@endsection