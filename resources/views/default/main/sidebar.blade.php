<div class="col-sm-3">
								<h2 class="title-category">
									<a href="/product" title="Category">Category</a>
								</h2>
	            				<ul class="list-cate wow fadeInRight">
	            					@foreach($TCate as $cate)
	            					<li>
						                 <a href="/{{$cate['alias']}}" title="DIE-CUT BAGS"> 
											<i class="fa fa-caret-right" aria-hidden="true"></i>{{$cate['name']}}
										</a>
									</li>
									@endforeach
								</ul>
								@if(!empty($News) )
								<h2 class="title-category">
									<a href="/news" title="Category">New focus</a>
								</h2>
								<ul class="list-news-left wow fadeInRight">
									@foreach($News as $news)
									<li>
										<div class="row">
											<div class="col-md-5 col-sm-4 col-xs-5">
												<div class="img-news-left">
													<a href="/news/{{$news['alias']}}" title="{{$news['name']}}">
														<img src="/public/upload/news/small/{{$news['picture']}}" alt="{{$news['name']}}" />
													</a>
												</div>
											</div>
											<div class="col-md-7 col-sm-8 col-xs-7">
												<div class="text-new-left">
													<h3 class="name-new-left">
														<a href="/news/{{$news['alias']}}">
															{{$news['name']}}
														</a>
													</h3>
													<div class="date-time">
														{{date("d/m/Y",strtotime($news['created_at']))}}                      
													</div>
												</div>
											</div>
										</div>
									</li>
									@endforeach
								</ul>
								@endif
	            			</div>