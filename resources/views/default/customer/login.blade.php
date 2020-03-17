@extends("default.index")
@section("css")
	<style type="text/css">
		div.form-group{
			text-align: left;
			font-style: 15px;
		}
		.error{
			color: red
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
	                        <a href="" title="tất cả sản phẩm ">Đăng nhập  </a>
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
							{!! Form::open(["method"=>"post"])!!}
							 <h2>Đăng nhập tài khoản</h2>

							 <div class="form-group col-sm-10 col-md-10">
							    <label for="">Email/Tên đăng nhập </label>
							  
							   	{!! Form::text("username",null,['class'=>'form-control'])!!}
							   	@if($errors->has("username"))
							   		<p class="error">
							   			{{$errors->first("username")}}
							   		</p>
							   	@endif
							  </div>
							   <div class="form-group col-sm-10 col-md-10">
							    <label for="">Mật khẩu </label>
							  
							   	{!! Form::password("password",['class'=>'form-control'])!!}
							   	@if($errors->has("password"))
							   		<p class="error">
							   			{{$errors->first("password")}}
							   		</p>
							   	@endif
							  </div>
							  <div class="col-sm-12 col-md12 ">
								  <div class="form-group col-sm-5 col-md-5">
								    <label>
									   	<input type="checkbox" name="remember" value='true'> nhớ mật khẩu 
								   	</label>
								  </div>
								    <div class="form-group col-sm-5 col-md-5">
								    		<a href="/quen-mat-khau">
								    				Quên mật khẩu
								    		</a>
								  		
								  </div>
							</div>
							  <div class="form-group col-sm-12 col-md-12 pd_left">
								 	<button class="btn" type="submit">Đăng nhập  </button>
							</div>
							 {!!Form::close()!!}
						</div>
				</div>

				
			</div>
		</section>


@endsection
