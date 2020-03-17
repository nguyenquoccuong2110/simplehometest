@extends("default.index")
@section("contents")
	<section class="maincontent">
			
			<div class="bannercate boxlazy">
				<img class="wide lazyload" data-src="/public/upload/company/{{$TCompany['banner']}}" src="/public/default/general/img/loader.gif" >
			</div>
		
			<div id="breadcrumb">
				<div class="container">
					<a href="/" title="Trang chủ">Trang chủ</a>
					
					<span> {{$TCompany['name']}}  </span>
				</div>
			</div>
			<div class="container divcontent">
				<div class="row">
					<div class="col-sm-12">
						<h1>
							 {{$TCompany['name']}}
						</h1>
							
							{!!$TCompany['content']!!}
					</div>
				</div> 
				<article>
					

				</article>
			</div>
		</section>
@endsection
