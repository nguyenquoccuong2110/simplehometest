@extends("default.index")
@section('css')
	<link rel="stylesheet" type="text/css" media="all" href="/public/default/detail/detail.css">

   <meta property="og:title"
          content="{{$Detail['name']}}"/>
    <meta property="og:site_name" content="{{$TGeneral['name']}}"/>
    <meta property="og:url" content="http://{{$_SERVER['SERVER_NAME']}}/{{$Detail->Cate()->alias}}/{{$Detail['alias']}}"/>
    <meta property="og:description"
          content="{{$Detail['description']}}"/>
    <meta property="og:type" content=""/>
    <meta property="og:image" content="/public/upload/product/{{$Detail['picture']}}"/>
        <meta property="og:locale" content="en_US"/>
        <!-- for Twitter -->
    <meta name="twitter:card"
          content="{{$Detail['name']}}"/>
    <meta name="twitter:title"
          content="{{$Detail['name']}}"/>
    <meta name="twitter:description"
          content="{{$Detail['description']}}"/>
    <meta name="twitter:image"
          content="http://{{$_SERVER['SERVER_NAME']}}/public/upload/product/{{$Detail['picture']}}"/>
@endsection
@section("js")
  <script type="text/javascript" src="/public/default/detail/detail.js"></script>
  
@endsection
@section("contents")
		   <div class="page-container">
	            <div class="page-content-wrapper cateproduct">
	            	<div class="container swin-btn-wrap center">
	            		<div class="row col_showproduct">
	            			<div class="col-sm-9">
								<div class="row">
									<div class="col-md-7 col-sm-12">
										<div class="img_detail">
											<img src="/public/upload/product/{{$Detail['picture']}}" alt="{{$Detail['name']}}" class="img img-responsive wow zoomIn" />
										</div>
									</div>
									<div class="col-md-5 col-sm-12">
										<h1 class="name_detail">{{$Detail['name']}}</h1>
										<div class="dcs_detail">
											<div class="code-prod-pages">
												Code: <span>{{$Detail['code']}}</span>
											</div>
											<ul class="detail_list">
												{{$Detail['description']}}                   
																	
											</ul>
											<p>Share</p>
											<ul class="socials socials-about list-unstyled list-inline">
												<li><a href="https://www.facebook.com/sharer.php?u=http://{{$_SERVER['SERVER_NAME']}}" title="facebook" target="_black" class="face"><i class="fa fa-facebook"></i></a></li>
												<li><a href="https://twitter.com/intent/tweet?text={{$Detail['name']}}&url=http://{{$_SERVER['SERVER_NAME']}}/{{$Detail->Cate()->alias}}/{{$Detail['alias']}}" title="{{$Detail['name']}}" target="_black" class="tw"><i class="fa fa-twitter"></i></a></li>
												
												<li><a href="https://plus.google.com/share?url=http://{{$_SERVER['SERVER_NAME']}}/{{$Detail->Cate()->alias}}/{{$Detail['alias']}}l" title="{{$Detail['name']}}" target="_black" class="google"><i class="fa fa-google-plus"></i></a></li>
											</ul>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="content-detail">
											<div class="tabs-detail">
												<ul class="nav nav-tabs">
													<li class="active"><a data-toggle="tab" href="#home-dt">Detailed information</a></li>
												</ul>
												<div class="tab-content wow fadeInLeft">
													<div id="home-dt" class="tab-pane fade in active">
														{!!$Detail['content']!!}
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-12 boxrelated">
										<h2><span class="swin-btn center form-submit"> <span>RELATED PRODUCTS </span></span></h2>
										<div class="flexslider carousel">
											<ul class="slides">
												@foreach($ProductOther as $product)
												<li>
													<div class="blog-item swin-transition item">
														<div class="blog-featured-img">
															<img src="/public/upload/product/big/{{$product['picture']}}" alt="#" class="img img-responsive">
														</div>
														<div class="blog-content">
																<h3 class="blog-title">
																	<a href="/{{$product->Cate()->alias}}/{{$product['alias']}}" class="swin-transition" title="{{$product['name']}}">{{$product['name']}}</a>
															</h3>
																<div class="blog-readmore">
																	<a href="/{{$product->Cate()->alias}}/{{$product['alias']}}" class="swin-transition" title="#">Read More 
																	<i class="fa fa-angle-double-right"></i>
																</a>
															</div>
														</div>
													</div>
												</li>
												@endforeach
											</ul>
										</div>
									</div>
								</div>
	            			</div>
	            			@include("default.main.sidebar")
	            		</div>
	            	</div>
	            </div>
	        </div>
@endsection