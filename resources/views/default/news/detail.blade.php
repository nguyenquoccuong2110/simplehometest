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
									<div class="col-md-12 contentnews">
                                        <h1 class="name-news" style="height: auto">{{$Detail['name']}}</h1>
                                        <img src="/public/upload/news/{{$Detail['picture']}}"/>
										<article>
                                                
                                                {!!$Detail['content']!!}
                                        </article>
									</div>
								</div>
	            			</div>
	            			@include("default.main.sidebar")
	            		</div>
	            	</div>
	            </div>
	        </div>
	@endsection
