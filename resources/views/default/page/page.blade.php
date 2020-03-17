@extends("default.index")
@section('css')
	<link rel="stylesheet" type="text/css" media="all" href="/public/default/news/news.css">
@endsection
@section('js')
    
    <script src="/public/default/news/news.js"></script>
@endsection
@section("contents")
		    <div class="page-container">
	            <div class="page-content-wrapper cateproduct">
	            	<div class="container swin-btn-wrap center">
	            		<div class="row col_showproduct">
	            			<div class="col-sm-9">
								<div class="row">
									<div class="col-sm-12">
                                        <div class="vc_column_container vc_col-sm-12">
                                            <div class="wpb_wrapper vc_column-inner">
                                                <div class="dcs-news-home boxaboutus">
                                                    <div class="panel-group" id="accordion">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h4 class="panel-title">
                                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" class="">
                                                                        <span class="swin-btn center form-submit"> <span>	about us </span></span>
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapse1" class="panel-collapse collapse in" aria-expanded="true" style="">
                                                                <div class="panel-body">
                                                                    <p>
                                                                            {!!$Page[1]['content']!!}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h4 class="panel-title">
                                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="collapsed" aria-expanded="false">
                                                                       
                                                                        <span class="swin-btn center form-submit"> <span>	 manufacturer  </span></span> 
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapse2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                                <div class="panel-body">
                                                                	<p>
                                                                            {!!$Page[2]['content']!!}
                                                                    </p>
                                                                    <p>
                                                                        <ul class="listmanu">
                                                                            <li>
                                                                                <a href="#" title="#">
                                                                                    <img src="/public/default/general/img/manu1.jpg" alt="manu 1" class="img img-responsive" />
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#" title="#">
                                                                                    <img src="/public/default/general/img/manu2.jpg" alt="manu 1" class="img img-responsive" />
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#" title="#">
                                                                                    <img src="/public/default/general/img/manu2.jpg" alt="manu 1" class="img img-responsive" />
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h4 class="panel-title">
                                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="collapsed" aria-expanded="false">
        
                                                                        <span class="swin-btn center form-submit"> <span>	  onsumption market  </span></span> 
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapse3" class="panel-collapse collapse " aria-expanded="false">
                                                                <div class="panel-body">
                                                                    <p>
                                                                           <p>
                                                                            {!!$Page[3]['content']!!}
                                                                    </p>
                                                                    </p>
                                                                    <ul class="listmanu listmarket">
                                                                        <li>
                                                                            <a href="#" title="#">
                                                                                <img src="/public/default/general/img/c1.jpg" alt="market 1" class="img img-responsive" />
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="#">
                                                                                <img src="/public/default/general/img/c2.jpg" alt="market 1" class="img img-responsive" />
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="#">
                                                                                <img src="/public/default/general/img/c3.jpg" alt="market 1" class="img img-responsive" />
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="#">
                                                                                <img src="/public/default/general/img/c4.jpg" alt="market 1" class="img img-responsive" />
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="#">
                                                                                <img src="/public/default/general/img/c5.jpg" alt="market 1" class="img img-responsive" />
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="#">
                                                                                <img src="/public/default/general/img/c6.jpg" alt="market 1" class="img img-responsive" />
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="#">
                                                                                <img src="/public/default/general/img/c7.jpg" alt="market 1" class="img img-responsive" />
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h4 class="panel-title">
                                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4" class="collapsed" aria-expanded="false">
                                                                        <span class="swin-btn center form-submit"> <span>	  Parner of the company  </span></span> 
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapse4" class="panel-collapse collapse " aria-expanded="false">
                                                                <div class="panel-body">
                                                                	<p>
                                                                            {!!$Page[4]['content']!!}
                                                                    </p>
                                                                    <ul class="listmanu listparner">
                                                                        <li>
                                                                            <a href="#" title="#">
                                                                                <img src="/public/default/general/img/p1.jpg" alt="parner 1" class="img img-responsive" />
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" title="#">
                                                                                <img src="/public/default/general/img/p2.jpg" alt="parner 1" class="img img-responsive" />
                                                                            </a>
                                                                        </li>
                                                                        </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dcs-news-home">
                                                    <div class="porto-separator taller  m-b-none">
                                                        <hr class="separator-line  align_center solid" style="background-color:#dbdbdb;">
                                                    </div>
                                                </div>
                                            </div>
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
