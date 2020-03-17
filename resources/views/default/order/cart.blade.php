@extends("default.index")
@section("css")
		 <link rel="stylesheet" type="text/css" media="all" href="/public/default/order/css/index.css">
		<style type="text/css">
			input.input-text{
				width: 60%;
			}
			textarea.input-text{
				width: 80%;
			}
			.note{
				color: red;
			}
			.opc-block-summary-opacity{
				opacity: 0.4;
				background: white;
				z-index: 100;
				-moz-opacity:0.4;
				-webkit-opacity:0.4;
			}
		</style>
@endsection
@section("contents")

	 <section id="maincontent" class="page-main">
        <div class="column main">
           <div id="checkout" class="checkout-container">
                <ul class="opc-progress-bar">
                    <li class="opc-progress-bar-item _active">
                        <span>
                            Giỏ hàng
                        </span>
                    </li>
                    <li class="opc-progress-bar-item">
                        <span> Hoàn thành đơn hàng </span>
                    </li>
                </ul>
            @if(count(session('product'))>0)
                 {!! Form::open(['method'=>'post','url'=>'/submit-cart','class'=>'form form-shipping-address']) !!}
                <div class="opc-wrapper">
                    <ul class="opc" id="checkoutSteps">
                        <li id="shipping" class="checkout-shipping-address">
                            <h1 class="step-title"> Thông tin người mua hàng </h1>
                            <div id="checkout-step-shipping" class="step-content">
                               
                               
                               
                                    <div id="shipping-new-address-form" class="fieldset address">
                                        <div class="field _required">
                                            <label class="label">
                                                <span>Họ và tên </span>
                                            </label>
                                            <div class="control">
                                            {!! Form::text("name",@$payment['name'],['class'=>'input-text','placeholder'=>"Nguyễn Văn A"])!!}
                                            @if($errors->has('name'))
                                               <span class="note">
                                                    <span>{{$errors->first('name')}}</span>
                                                </span>
                                            @endif
                                            </div>
                                        </div>

                                       <div class="field _required">
                                            <label class="label">
                                                <span>Số điện thoại  </span>
                                            </label>
                                            <div class="control">
                                            {!! Form::number("phone",@$payment['phone'],['class'=>'input-text','placeholder'=>"12345678"])!!}
                                            @if($errors->has('phone'))
                                               <span class="note">
                                                    <span>{{$errors->first('phone')}}</span>
                                                </span>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="field _required">
                                            <label class="label">
                                                <span>Email</span>
                                            </label>
                                            <div class="control">
                                            {!! Form::email("email",@$payment['email'],['class'=>'input-text','placeholder'=>"abc@gmail.com"])!!}
                                            @if($errors->has('email'))
                                               <span class="note">
                                                    <span>{{$errors->first('email')}}</span>
                                                </span>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="field ">
                                            <label class="label">
                                                <span> Địa chỉ </span>
                                            </label>
                                            <div class="control">
                                            {!! Form::text("address",@$payment['address'],['class'=>'input-text','placeholder'=>"Địa chỉ ( Không bắt buộc )"])!!}
                                           
                                            </div>
                                        </div>
                                         <div class="field ">
                                            <label class="label">
                                                <span> Ghi chú </span>
                                            </label>
                                            <div class="control">
                                            {!! Form::textarea("note",@$payment['note'],['class'=>'input-text','rows'=>5,'placeholder'=>"Nội dung ghi chú ( Không bắt buộc )"])!!}
                                           
                                            </div>
                                        </div>
                                     </div>
                                	  <div class="actions-toolbar" id="shipping-method-buttons-container">
                                           <div class="primary">
                                              <button data-role="opc-continue" type="submit" class="button action continue primary">
                                                 <span>
                                                    <span>Thanh Toán tại nhà </span>
                                                 </span>
                                              </button>
                                           </div>
                                        </div>
                               
                            </div>
                        </li>
                       
                    </ul>
                </div>

                <aside class="modal-custom opc-sidebar opc-summary-wrapper">
                    <div class="modal-inner-wrap">
                        <div class="modal-content">
                           <div id="opc-sidebar">
                                <div class="opc-block-summary">
                                     <h2 class="title">Giỏ hàng </h2>
                                     <div class="block items-in-cart">
                                        <div class="title">
                                           <strong>
                                                <span>{{count(session('product'))}}</span>
                                                <span>Sản phẩm </span>
                                           </strong>
                                        </div>
                                        <div class="content minicart-items">
                                            <div class="minicart-items-wrapper overflowed">
                                                <ul class="minicart-items">
                                                	<?php $total=0;?>
                                                	@if(!empty(session('product')))
                                                	@foreach(session('product') as $product)
                                                    <li class="product-item">
                                                    	<a href='/remove-cart?id={{$product["product"]["id"]}}' class='my_remove'> Xoá </a>
                                                        <div class="product">
                                                           <span class="product-image-container" style="height: 75px; width: 75px;">
                                                               <span class="product-image-wrapper">

                                                                    <img src="/public/upload/product/small/{{$product['product']['picture']}}" width="75" height="75" alt="{{$product['product']['name']}}">
                                                               </span>
                                                           </span>
                                                           <div class="product-item-details">
                                                              <div class="product-item-inner">
                                                                 <div class="product-item-name-block">
                                                                    <a href="/{{$product['product']['cate_alias']}}/{{$product['product']['alias']}}" class="product-item-name text text-danger">{{$product['product']['name']}}

                                                                    </a>
                                                                    <div class="details-qty">
                                                                       <span class="label">
                                                                          <span>Số lượng</span> 
                                                                       </span>
                                                                       <span class="value ">
		                                                                      {{$product['limited']}}
									                                    </span>

                                
                                                                    </div>
                                                                 </div>
                                                                 <div class="subtotal">
                                                                    <span class="price-excluding-tax" >
                                                                       <span class="cart-price">
                                                                       <span class="price" >{{App\MrData::toPrice($product['product']['price'])}}</span>
                                                                       <?php $total=$total+$product['product']['price']*$product['limited']?>
                                                                       </span>
                                                                    </span>
                                                                 </div>
                                                              </div>
                                                           </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                    @endif
                                                </ul>

                                                
                                                <div class="box_total">
                                                    <div class="payment-option-title field choice">
                                                        <span >Tổng cộng: </span>
                                                    </div>
                                                    <div>
                                                        <strong class="price text text-danger" >{{App\MrData::toPrice($total)}}</span>
                                                                       </strong>
                                                    </div>
                                                </div>
                                                <div class="checkout-shipping-method">
                           
								
                                <div id="checkout-step-shipping_method" class="step-content">
                                   		@if(Auth::check())
                                   			@if(Auth::user()->total_match > 0)
                                        <div id="checkout-shipping-method-load">
                                           <table class="table-checkout-shipping-method">
                                            
                                              </thead>
                                              <tbody>
                                              	<tr class="row">
                                                    <td class="col col-method" colspan="2">
                                                     Sử dụng số điểm tích luỹ 
                                                    </td>
                                                    
                                                  
                                                 </tr>
                                                 <tr class="row">
                                                    <td class="col col-method">
                                                       <input type="radio" class="radio" value="{{Auth::user()->total_match*$TMath['sell']}}" id="s_method_tablerate_bestway" name="match">
                                                    </td>
                                                    <td class="col col-price">
                                                       <span class="price"><span class="price">- {{App\MrData::toPrice(Auth::user()->total_match*$TMath['sell'] )}}</span></span>
                                                    </td>
                                                  
                                                 </tr>
                                                 
                                              </tbody>
                                           </table>
                                        </div>
                                        @endif
                                        @endif
                                      
                                   
                                </div>
                            </div>





                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>

                 {!!Form::close()!!}
            @else
                <div class="row">
                        <div class="text text-align text-info" style="text-align: center;">
                            <h2>Bạn chưa mua sản phẩm nào</h2>
                            <a href='/san-pham' class='btn  btn-primary' style="color: white">
                                <span>Mua sắm</span> </a>

                        </div>  
                </div>
            @endif
            </div>
        </div>
    </section>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $(".field-tooltip-action").click(function(event) {
                $(this).next(".field-tooltip-content").toggle();
            });
            $(".items-in-cart .title").click(function(event) {
                $(this).next(".minicart-items").toggle();
                $(this).toggleClass('active');
            });
            $(".my_remove").click(function(){
            	$(".opc-block-summary").addClass("opc-block-summary-opacity");
            	$.get($(this).attr("href"),function(){

            		window.location.href=window.location.href;
            	});
            	return false;
            });
        });
    </script>


@endsection
