@extends("default.index")
@section("css")
	<style type="text/css">
		div.form-group{
			text-align: left;
			font-size: 15px;
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
	                <h1> Đăng nhập  </h1>
	                <ul class="items">
	                    <li class="item home">
	                        <a href="/" title="Trang chủ ">Trang chủ </a>
	                    </li>
	                    <li class="item">
	                        <a href="" title="tất cả sản phẩm ">Đăng ký  </a>
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

							 <h2>Đăng ký </h2>
							{!! Form::open(["method"=>"post"])!!}
								<div class="form-group col-sm-10 col-md-10">
								    <label for="">Tên đăng nhập <span style="color: red">(*)</span>
								     </label>
								  
								   	{!! Form::text("username",null,['class'=>'form-control'])!!}

								   	@if($errors->has("username"))
								   		<p class="error">
								   			{{$errors->first("username")}}
								   		</p>
								  
								   	@endif
							</div>
							<div class="form-group col-sm-10 col-md-10">
							    <label for="">Mật khẩu <span style="color: red">(*)</span> </label>
							  
							   	{!! Form::password("password",['class'=>'form-control'])!!}
							   	@if($errors->has("password"))
							   		<p class="error">
							   			{{$errors->first("password")}}
							   		</p>
							   	@endif
							  </div>
							  <div class="form-group col-sm-10 col-md-10">
							    <label for="">Nhập lại Mật khẩu <span style="color: red">(*)</span> </label>
							  
							   	{!! Form::password("password_confirmation",['class'=>'form-control'])!!}
							   	@if($errors->has("password_confirmation"))
							   		<p class="error">
							   			{{$errors->first("password_confirmation")}}
							   		</p>
							   	@endif
							  </div>

							 <div class="form-group col-sm-10 col-md-10">
							    <label for="">Họ và tên <span style="color: red">(*)</span>
							     </label>
							  
							   	{!! Form::text("name",null,['class'=>'form-control'])!!}

							   	@if($errors->has("name"))
							   		<p class="error">
							   			{{$errors->first("name")}}
							   		</p>
							  
							   	@endif
							  </div>
							  <div class="form-group col-sm-10 col-md-10">
							    <label for="">Email <span style="color: red">(*)</span>
							     </label>
							  
							   	{!! Form::email("email",null,['class'=>'form-control'])!!}

							   	@if($errors->has("email"))
							   		<p class="error">
							   			{{$errors->first("email")}}
							   		</p>
							   	
							   	@endif
							  </div>


							  <div class="form-group col-sm-10 col-md-10">
							    <label for="">Sô điện thoại  <span style="color: red">(*)</span>
							     </label>
							  
							   	{!! Form::number("phone",null,['class'=>'form-control'])!!}

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
							  
							   	{!! Form::text("address",null,['class'=>'form-control'])!!}

							   	@if($errors->has("address"))
							   		<p class="error">
							   			{{$errors->first("address")}}
							   		</p>
							   
							   	@endif
							  </div>
							  
							  

							   
							  <div class="form-group col-sm-12 col-md-12 pd_left">
								 	<button class="btn" type="submit">Đăng ký </button>
							</div>
							 {!!Form::close()!!}
						</div>
				</div>

				
			</div>
		</section>


@endsection
