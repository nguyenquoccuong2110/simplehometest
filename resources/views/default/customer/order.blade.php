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
		.opacity_class{
			opacity: 0.5;
			background: white;
			z-index: 1111;
			pointer-events: none;
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
	                        <a href="" title="tất cả sản phẩm ">Đơn hàng của tôi    </a>
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

							 <h2> Đơn hàng của tôi  </h2>
							  <table class="table table-striped">
								    <thead>
								      <tr>
								        <th>Mã đơn hàng </th>
								        <th>Ngày mua </th>
								        <th> Sản phẩm </th>
								        <th> Tổng tiền </th>
								        <th> Trạng thái  </th>
								      </tr>
								    </thead>
								    <tbody>
								    	@if($Order)
								    	@foreach($Order as $or)
								      <tr>
								        <td>
								        <a href="/chi-tiet-don-hang/{{$or['number_order']}}">
								        	{{$or['number_order']}}
								        </a>
								        </td>
								        <td>{{$or['date_ship']}}</td>
								      <td>
								      	@if(!empty($or->product[0]))
								      	{{$or->product[0]->name}} 
								      		@if(count($or->product)>1)
								      		 và {{count($or->product)-1}} Sản phẩm khác 
								      		 @endif
								      	@endif
								      </td>
								      <td>{{App\MrData::toPrice($or['total_price'])}}</td>
								      <td>
								      		@if($or['approved']=='1')
								      			<a href="/huy-don-hang/{{$or['number_order']}}" class="btn btn-small btn-danger remove_order">Huỷ đơn hàng </a>
								      		@endif
								      		@if($or['approved']=='2')
								      			<span class="text text-primary">Đang giao hàng </span>
								      		@endif
								      		@if($or['approved']=='3')
								      			<span class="text text-success">Giao hàng thành công  </span>
								      		@endif
								      		@if($or['approved']=='4')
								      			<span class="text text-danger"> Đơn hàng đã huỷ  </span>
								      		@endif
								      </td>
								      </tr>
								      @endforeach
								      @endif
								    </tbody>
								  </table>
								
						</div>
				</div>

				
			</div>
		</section>
		<script type="text/javascript">
				$(document).ready(function(){
					$(".remove_order").click(function(){
						if(confirm("Bạn muốn huỷ đơn hàng này? ")){
							$(this).parent().parent().addClass("opacity_class");
							$.get($(this).attr("href"),function(){
									window.location.href=window.location.href;
							});

						}
						return false;
					});
				});

		</script>


@endsection
