	@extends("default.index")
	@section("css")
		 <link rel="stylesheet" type="text/css" media="all" href="/public/default/news/news.css">
	@endsection
	@section("js")
		<script type="text/javascript" src="/public/default/news/news.js"></script>
	@endsection
	@section("contents")
		<div class="page-container">
	            <div class="page-content-wrapper cateproduct">
	            	<div class="container swin-btn-wrap center">
	            		<div class="row col_showproduct">
	            			<div class="col-sm-9">
								<div class="row">
									<div class="col-md-12">
										<ul class="list-new">
											@foreach($List_News as $news)
											<li>
												<div class="list-super row">
													<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 col-430">
														<a href="/news/{{$news['alias']}}" title="{{$news['name']}}">
															<img src="/public/upload/news/big/{{$news['picture']}}" alt="{{$news['name']}}" class="img img-responsive wow fadeInUpShort">
														</a>
													</div>
													<div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 col-430">
														<a href="/news/{{$news['alias']}}" title="{{$news['name']}}">
															<h2 class="name-news">
																{{$news['name']}}
															</h2>
														</a>
														<div class="date">
															<i class="fa fa-calendar" aria-hidden="true"></i><i>{{date('d/m/Y',strtotime($news['created_at']))}}</i>
														</div>
														<div class="dcs-list-item">
															<p>{{$news['description']}}</p>
														</div>
														<div class="pull-right">
															<a href="/news/{{$news['alias']}}" title="{{$news['name']}}">Read more
																<i class="fa fa-angle-double-right" aria-hidden="true"></i>
															</a>
														</div>
													</div>
												</div>
											</li>
											@endforeach
										</ul>
									</div>
									<div class="col-sm-12 btn_showmore">
										{!!$List_News->render()!!}
									</div>
								</div>
	            			</div>
	            			@include("default.main.sidebar")
	            		</div>
	            	</div>
	            </div>
	        </div>
	@endsection
