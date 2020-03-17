	@extends("default.index")
	@section("css")
		 <link rel="stylesheet" type="text/css" media="all" href="/public/default/news/css/index.css">
	@endsection
	@section("contents")
		<div class="breadcrumbs">
    <div class="page-main">
                    <h1> Trang tin tức  </h1>
                <ul class="items">
                            	<li class="item home">
                                    <a href="/" title="trang chủ ">
                                    	Trang chủ 
                                    </a>
                                </li>
                                <li class="item home">
                                    <a href="/tin-tuc" title="Tin tức">
                                    	Tin tức
                                    </a>
                                </li>
                           		 <li class="item category11">
                                    <strong>{{$Detail['name']}} </strong>
                                </li>
                    </ul>
    </div>
</div>
	<main id="maincontent" class="page-main">


		<div class="row columns">
			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12  main">






	<div class="ves-blog column">
			<div class="blog-grid">
			<?php $i=0;?>
			@if($News)
			@foreach($News as $n)
			@if($i%2==0)
			<div class="row">
			@endif
			<?php $i=$i+1;?>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					
							<div class="ves-post post-item">
											<div >
									<a href="/chi-tiet-tin-tuc/{{$n['alias']}}" title="{{$n['name']}}">
										<img src="/public/upload/news/big/{{$n['picture']}}" alt="{{$n['name']}}">
									</a>

								

								</div>
								

								<div class="post-metas">
									<div class="post-infos">
													<div class="post-titles">
										<h3><a href="/chi-tiet-tin-tuc/{{$n['alias']}}" title="{{$n['name']}}">
											{{$n['name']}}
										</a></h3>
									</div>
											<div class="post-date">
																				<span><?php echo Date("d/m/Y",strtotime($n['updated_at'])) ?></span>
													<span class="operator">/</span>
									</div>
																	<div class="post-comment">
											{{$n['counted']}} lượt xem 			</div>
																	</div>


												</div>
							</div>

						</div>	
		@if(count($News) < 2)
			</div>
		@endif
		@if($i%2==0)				
		</div>
		@endif
		@endforeach
		@endif


		</div>
			<div class="blog-toolbar toolbar">
			 
	    
	        
	                <div class="pages">
	        {!!$News->render()!!}
	        </div>
	        
	    
	    
		</div>
		</div>

		</div>

	<div class="col-md-3 sidebar sidebar-main"><div class="blog-searchform block">
		
	</div><div class="ves-block block">
		<div class="block-title">
			<strong>Danh mục tin tức </strong>
		</div>
		<div class="block-content">
			<ul class="blog-cats">
				@if($ListCate)
					@foreach($ListCate as $c)
							<li><a href="/tin-tuc/{{$c['alias']}}" title="Technical">{{$c['name']}}</a></li>
					@endforeach
				@endif
			</ul>
		</div>
	</div>
	
	
	</div>


		</div>
	</main>
	@endsection
