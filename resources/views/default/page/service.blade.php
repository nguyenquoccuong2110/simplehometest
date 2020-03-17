@extends("default.index")
@section("contents")
	<section class="maincontent">
			@if(!empty($TBanner))
			<div class="bannercate boxlazy">
				<img class="wide lazyload" data-src="/public/upload/banner/{{$TBanner['picture']}}" src="/public/default/general/img/loader.gif" >
			</div>
			@endif
			<div id="breadcrumb">
				<div class="container">
					<a href="/" title="Trang chủ">Trang chủ</a>
					
					<span>Dịch vụ </span>
				</div>
			</div>
			<div class="container divcontent">
				<div class="row">
					<div class="col-sm-12">
						<h1>
							Dịch vụ
						</h1>
						<article >
						{!!$THome['description']!!}
						</article>
					</div>
				</div> 
				<br /><br/>
				{!!Form::open(['method'=>'post','url'=>'/submit-dich-vu'])!!}

				@if(count($errors)>0)
				<div class='alert alert-danger'>
						<ul>
								@foreach($errors->all() as $k=>$error)
									<li>{{$error}}</li>
								@endforeach
						</ul>
				</div>
				@endif
				@if(!empty(session('success')))
					<div class="alert alert-success">
						
						{!! session('success') !!}
					</div>
				@endif

				<div class="row">
						<div class="col-sm-5">
							  <div class="form-group">
						    <label for="name">Tên: {{@$x}}</label>
						 
	{!!Form::text("name",@$data['name'],['class'=>"form-control"])!!}
	<span style="color:red">*</span>
	
						  </div>
						 

						  <div class="form-group">
						    <label for="formGroupExampleInput2">Số điện thoại : </label>
		{!!Form::text("phone",@$data['phone'],['class'=>"form-control"])!!}
			<span style="color:red">*</span>
	
						  </div>

						   <div class="form-group">
						    <label for="formGroupExampleInput2">Email: </label>
		{!!Form::text("email",@$data['email'],['class'=>"form-control"])!!}
	
						  </div>


						    <div class="form-group">
						   <button type="submit" class='btn btn-danger'>ĐĂNG KÝ </button>
						  </div>
						</div>
				</div>
				{!!Form::close()!!}
			</div>
		</section>
@endsection
