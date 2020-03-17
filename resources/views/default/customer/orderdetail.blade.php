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
	                        <a href="" title="tất cả sản phẩm "> Đơn hàng của tôi    </a>
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
							<div class="card" style="text-align: left">
								
								  <div class="card-body">
								    <h5 class="card-title">Thông tin đơn hàng. </h5>
								    <p class="card-text">Họ và tên: <strong>{{$Order['name']}}</strong> </p>
								    <p class="card-text">Email: <strong>{{$Order['email']}}</strong> </p>
								    <p class="card-text">Số điện thoại : <strong>{{$Order['phone']}}</strong> </p>
								    <p class="card-text">Ghi chú : <strong>{{$Order['note']}}</strong> </p>
								     <p class="card-text">Ngày đặt hàng : <strong>{{$Order['date_ship']}}</strong> </p>
								  </div>
							
								<br />
									@if($Order['approved']=='1')
								      			<p class="text text-primary">Đơn hàng mới tạo  </p>
								      		@endif
								      		@if($Order['approved']=='2')
								      			<p class="text text-primary">Đang giao hàng </p>
								      		@endif
								      		@if($Order['approved']=='3')
								      			<p class="text text-success">Giao hàng thành công  </p>
								      		@endif
								      		@if($Order['approved']=='4')
								      			<p class="text text-danger"> Đơn hàng đã huỷ  </p>
								      		@endif
								<br />
								</div>
							  <table class="table table-striped">
								    <thead>
								      <tr>
								        <th>ID</th>
								        <th>Tên sản phẩm  </th>
								        <th> Hình ảnh  </th>
								        <th> Giá tiền </th>
								         <th> Số lượng  </th>
								          <th> Tổng tiền </th>
								      
								      </tr>
								    </thead>
								    <tbody>
								    	@if($Order->product)
								    	@foreach($Order->product as $p)
								    	<?php $order_product=App\Orderproduct::where("cid_product",$p['id'])->first();?>
								      <tr>
								        
								        <td>{{$p['id']}}</td>
								          <td>{{$p['name']}}</td>
								            <td><img src="/public/upload/product/small/{{$p['picture']}}" /></td>
								              <td>{{App\MrData::toPrice($order_product['price'])}}</td>
								              <td>{{$order_product['limited']}}</td>
								              <td>{{App\MrData::toPrice($order_product['total_price'])}}</td>
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
							$.get($(this).attr("href"),function(){
									$(this).parent().parent().remove();
							});

						}
						return false;
					});
				});

		</script>


@endsection
