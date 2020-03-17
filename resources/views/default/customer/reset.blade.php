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
	                <h1>  Quên mật khẩu   </h1>
	                <ul class="items">
	                    <li class="item home">
	                        <a href="/" title="Trang chủ ">Trang chủ </a>
	                    </li>
	                    <li class="item">
	                        <a href="" title="tất cả sản phẩm "> khôi phục mật khẩu  </a>
	                    </li>
	                    
	                </ul>
	            </div>
	        </div>

			
			<div class="container divcontent form-customer">
				<div class='row form-submit'>
						<div class='col-sm-3 col-md-3'>
							@include("default.customer.sidebar")
								
						</div>
						<div class='col-sm-9 col-md-9'>
							{!! Form::open(["method"=>"post","url"=>"/phuc-hoi-mat-khau/".$token])!!}
							 <h2>khôi phục mật khẩu</h2>
							 <input type="hidden" name="token" value="{{$token}}">
							 <div class="form-group col-sm-6 col-md-6">
							    <label for="">Email</label>
							  
							   	{!! Form::text("email",null,['class'=>'form-control'])!!}
							   	@if($errors->has("email"))
							   		<p class="error">
							   			{{$errors->first("email")}}
							   		</p>
							   	@endif
							   		@if($errors->has("token"))
							   		<p class="error">
							   			{{$errors->first("token")}}
							   		</p>
							   	@endif
							  </div>
								<div class="form-group col-sm-6 col-md-6">
							    <label for="">Mật khẩu mới  </label>
							  
							   	{!! Form::password("password",['class'=>'form-control'])!!}
							   	@if($errors->has("password"))
							   		<p class="error">
							   			{{$errors->first("password")}}
							   		</p>
							   	@endif
							  </div>
							    <div class="form-group col-sm-6 col-md-6">
							    <label for="">Nhập lại Mật khẩu <span style="color: red">(*)</span> </label>
							  
							   	{!! Form::password("password_confirmation",['class'=>'form-control'])!!}
							   	@if($errors->has("password_confirmation"))
							   		<p class="error">
							   			{{$errors->first("password_confirmation")}}
							   		</p>
							   	@endif
							  </div>

							
							  <div class="form-group col-sm-12 col-md12 ">
								 	<button class="btn" type="submit"> Lấy lại mật khẩu  </button>
							</div>
							 {!!Form::close()!!}
						</div>
				</div>

				
			</div>
		</section>


@endsection
