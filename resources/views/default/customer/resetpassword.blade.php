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
	                        <a href="" title="tất cả sản phẩm "> Quên mật khẩu  </a>
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
							{!! Form::open(["method"=>"post"])!!}
							 <h2>Quên mật khẩu </h2>
							 @if(!empty(session('success')))
							 	<div class="alert alert-primray">
							 			{{session('success')}}
							 	</div>
							 @endif
							 <div class="form-group col-sm-6 col-md-6">
							    <label for="">Email</label>
							  
							   	{!! Form::text("email",null,['class'=>'form-control'])!!}
							   	@if($errors->has("email"))
							   		<p class="error">
							   			{{$errors->first("email")}}
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
