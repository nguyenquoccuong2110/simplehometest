@extends("default.index")
@section('css')
	<link rel="stylesheet" type="text/css" media="all" href="/public/default/news/news.css">
	<style type="text/css">
		.page-container{
			margin-top:20px;
		}
	</style>
@endsection
@section('js')
    
    <script src="/public/default/news/news.js"></script>
@endsection
@section("contents")

 <div class="page-container">
	            <div class="page-content-wrapper cateproduct">
	            	<div class="container swin-btn-wrap center">
	            		<div class="row col_showproduct">
	            			<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-12">
                                        <div class="vc_column_container vc_col-sm-12">
                                            <div class="wpb_wrapper vc_column-inner">
                                                <div class="dcs-news-home boxaboutus">
                                                 <div class="panel-heading">
                                                                <h4 class="panel-title">
                                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" class="">
                                                                        <span class="swin-btn center form-submit"> <span>	Contact us </span></span>
                                                                    </a>
                                                                </h4>
                                                            </div>                                                    
												<div class="container divcontent">
												
													{!!Form::open(['method'=>'post','url'=>'/post-contact'])!!}

													
													

													<div class="row">
															@if(!empty(session('success')))
															<div class=" alert alert-success">
																
																{!! session('success') !!}
															</div>
														@endif
															<div class="col-sm-6 col-md-6">
																	<div id="map_canvas" style="width:100%;height: 500px;"></div>
															</div>
															<div class="col-sm-6 col-md-6">
																  <div class="form-group">
															    <label for="name">Full name:</label>
															 
															{!!Form::text("name",@$data['name'],['class'=>"form-control"])!!}
															<span style="color:red">*</span>
															@if($errors->has('name'))
																<div style="color: red">
																
																{!! $errors->first("name") !!}
																</div>
															@endif
															
															  </div>
															 
															   <div class="form-group">
															    <label for="formGroupExampleInput2">Phone: </label>
											{!!Form::number("phone",@$data['phone'],['class'=>"form-control"])!!}
											<span style="color:red">*</span>
														@if($errors->has('phone'))
																<div style="color: red">
																
																{!! $errors->first("phone") !!}
																</div>
															@endif
															  </div>


															   <div class="form-group">
															    <label for="formGroupExampleInput2">Email: </label>
											{!!Form::email("email",@$data['email'],['class'=>"form-control"])!!}
											<span style="color:red">*</span>
														@if($errors->has('email'))
																<div style="color: red">
																
																{!! $errors->first("email") !!}
																</div>
															@endif
															  </div>

															  <div class="form-group">
															    <label for="formGroupExampleInput2">Subject : </label>
											{!!Form::text("subject",@$data['subject'],['class'=>"form-control"])!!}
											<span style="color:red">*</span>
													@if($errors->has('subject'))
																<div style="color: red">
																
																{!! $errors->first("subject") !!}
																</div>
															@endif
															  </div>

															  <div class="form-group">
															    <label for="formGroupExampleInput2">Content : </label>
											
											{!!Form::textarea("content",@$data['content'],['class'=>"form-control",'rows'=>7])!!}
											<span style="color:red">*</span>
													@if($errors->has('content'))
																<div style="color: red">
																
																{!! $errors->first("content") !!}
																</div>
															@endif
															  </div>
															    <div class="form-group">
															   <button type="submit" class='btn btn-danger'>Contact  </button>
															  </div>
															</div>
													</div>
													{!!Form::close()!!}
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
	            			
	            		</div>
	            	</div>
	            </div>
	        </div>

	 <div class="page-container">
			
			             

                                                             


<script   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKtsH84o33bs8bjj38srCq9YFz-8DycgE"></script>
		<script type="text/javascript" >
							function initialize() {
								var myLatlng = new google.maps.LatLng(10.7525809, 106.6696974);
								var mapOptions = {
									zoom: 17,
									center: myLatlng
								};

								var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

								var contentString = "<table style='text-align:left; font-weight:100;'><tr><th style='font-size:16px; color:#039BB2; font-weight:bold; text-transform: uppercase;'> {{$TGeneral['name']}} </th></tr><tr><th>Địa chỉ :  {{$TGeneral['address']}} </th></tr><tr><th>Điện thoại : {{$TGeneral['phone']}}</th></tr><tr><th>Email :  {{$TGeneral['email']}}</th></tr></table>";

								var infowindow = new google.maps.InfoWindow({
									content: contentString
								});

								var marker = new google.maps.Marker({
									position: myLatlng,
									map: map,
									title: "{{$TGeneral['name']}}"
								});
								infowindow.open(map, marker);
							}

							google.maps.event.addDomListener(window, 'load', initialize);


						</script>
@endsection
