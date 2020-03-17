@extends("default.index")
@section("contents")
<section class="maincontent">
			<div class="bannercate boxlazy">
				<img class="wide lazyload" data-src="/public/upload/cate/{{$TCate['banner']}}" src="/public/default/general/img//loader.gif" alt="{{$TCate['name']}}">
			</div>
			<div id="breadcrumb">
				<div class="container">
					<a href="/" title="Trang chủ">Trang chủ</a>
					<a href="/" title="Trang chủ">{{$TParent['name']}}</a>
					<span>{{$TCate['name']}}</span>		
				</div>
			</div>
			<div class="container divcontent">
				<h1>{{$TCate['name']}}</h1>
				<article>
					<p>
						{!!$TCate['description']!!}
					</p>
						
				</article>
				@if($TProduct)
				<div class="row list_catechild">
					@foreach($TProduct as $product)
				
					<div class="col-sm-3">
						<a href="/{{$TCate['alias']}}/{{$product['alias']}}" title="{{$product['name']}}">
							<div class="thumb boxlazy">
								<img data-src="/public/upload/product/big/{{$product['picture']}}" src="/public/default/general/img//loader.gif" class="lazyload" alt="{{$product['name']}}">
							</div>
							<h3>{{$product['name']}}</h3>
						</a>
					</div>
					@endforeach
				</div>
				<div class='row'>
					<div class="col-sm-12 box_pagination">
						{!!$TProduct->render()!!}
					</div>
				</div>
				@endif
			</div>
		</section>
@endsection