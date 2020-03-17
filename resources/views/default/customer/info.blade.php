@extends("default.index")
@section("css")
	<style type="text/css">
		div.form-group{
			text-align: left;
			font-style: 15px;
		}
		.error{
			color: red;
		}
	</style>
@endsection
@section("contents")
	<section class="maincontent">
			<div class="breadcrumbs">
	            <div class="page-main">
	                <h1> Thông tin đăng nhập  </h1>
	                <ul class="items">
	                    <li class="item home">
	                        <a href="/" title="Trang chủ ">Trang chủ </a>
	                    </li>
	                    <li class="item">
	                        <a href="" title="tất cả sản phẩm ">Thông tin cá nhân    </a>
	                    </li>
	                    
	                </ul>
	            </div>
	        </div>

			
			<div class="container divcontent form-customer">
				<div class='row form-submit'>
						<div class='col-sm-5 col-md-5'>
								@include("default.customer.sidebar")

						</div>

						<div class='col-sm-7 col-md-7'>

							 <h2>Thông tin cá nhân  </h2>
							  @if(!empty(session('success')))
							 	<div class="alert alert-primary">
							 		{{session('success')}}
							 	</div>
							 @endif 
							{!! Form::open(["method"=>"post"])!!}
								<div class="form-group col-sm-10 col-md-10">
								    <label for="">Tên đăng nhập <span style="color: red">(*)</span>
								     </label>
								  
								   	{!! Form::text("username",$User['username'],['class'=>'form-control'])!!}

								   	@if($errors->has("username"))
								   		<p class="error">
								   			{{$errors->first("username")}}
								   		</p>
								  
								   	@endif
							</div>
							
							 <div class="form-group col-sm-10 col-md-10">
							    <label for="">Họ và tên <span style="color: red">(*)</span>
							     </label>
							  
							   	{!! Form::text("name",$User['name'],['class'=>'form-control'])!!}

							   	@if($errors->has("name"))
							   		<p class="error">
							   			{{$errors->first("name")}}
							   		</p>
							  
							   	@endif
							  </div>
							  <div class="form-group col-sm-10 col-md-10">
							    <label for="">Email <span style="color: red">(*)</span>
							     </label>
							  
							   	{!! Form::email("email",$User['email'],['class'=>'form-control'])!!}

							   	@if($errors->has("email"))
							   		<p class="error">
							   			{{$errors->first("email")}}
							   		</p>
							   	
							   	@endif
							  </div>


							  <div class="form-group col-sm-10 col-md-10">
							    <label for="">Sô điện thoại  <span style="color: red">(*)</span>
							     </label>
							  
							   	{!! Form::number("phone",$User['phone'],['class'=>'form-control'])!!}

							   	@if($errors->has("phone"))
							   		<p class="error">
							   			{{$errors->first("phone")}}
							   		</p>
							 
							   	@endif
							  </div>

							  <div class="form-group col-sm-10 col-md-10">
							    <label for="">
							    		Địa chỉ 
							     </label>
							  
							   	{!! Form::text("address",$User['address'],['class'=>'form-control'])!!}

							   	@if($errors->has("address"))
							   		<p class="error">
							   			{{$errors->first("address")}}
							   		</p>
							   
							   	@endif
							  </div>
							  
							  

							   
							  <div class="form-group col-sm-12 col-md-12 ">
								 	<button class="btn" type="submit">Thay đổi thông tin  </button>
							</div>
							 {!!Form::close()!!}
						</div>
				</div>

				
			</div>
		</section>


@endsection
