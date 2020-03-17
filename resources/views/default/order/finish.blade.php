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
        <div id="checkout" class="checkout-container">
            <ul class="opc-progress-bar">
                <li class="opc-progress-bar-item _complete">
                    <span>Giỏ hàng</span>
                </li>
                <li class="opc-progress-bar-item _active">
                    <span>Hoàn thành đơn hàng</span>
                </li>
            </ul>
            <div class="opc-wrapper">
                 <br />
                <h1 class="step-title"> ĐƠN HÀNG ĐÃ HOÀN TẤT !</h1>
                <p class="desc_order">
                    Xin chào: Anh / Chị {{$Payment['name']}}
                </p>
                <p class="desc_order">Cảm ơn bạn đã đặt hàng trên website của chúng tôi. Số đơn hàng của bạn là: <strong class='text text-danger'>{{$Number_code}}</strong>. Chúng tôi sẽ liên hệ lại với bạn để xác nhận đơn đặt hàng. 
                    Khi cần hỗ trợ vui lòng gọi : <strong class='text text-danger'>{{$TGeneral['hotmail']}} (từ 8:30 - 21:00)
                    </strong>
                    <br />
                </p>
                <div class="opc-block-shipping-information">
                    <div class="shipping-information">
                        <div class="ship-to">
                            <div class="shipping-information-title">
                                <span>Thông tin đặt hàng:</span>
                            </div>
                            <div class="shipping-information-content">
                                <p>
                                    <strong>Họ và tên: </strong><span>{{$Payment['name']}}</span>
                                </p>
                                
                                <p>
                                    <strong>Số điện thoại: </strong><span>{{$Payment['phone']}}</span>
                                </p>
                                <p>
                                    <strong>Email:</strong><span>{{$Payment['email']}}</span>
                                </p>
                                <p>
                                    <strong>Địa chỉ: </strong><span>{{$Payment['address']}}</span>
                                </p>
                                <p>
                                    <strong>Ghi chú: </strong><span>{{$Payment['note']}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="actions-toolbar buyotherp">
                   <div class="primary">
                      <a class="button action continue primary" href="/san-pham" title="Buy other product">
                            <span>Mua thêm sản phẩm khác </span>
                      </a>
                   </div>
                </div>
            </div>
            <aside class="modal-custom opc-sidebar opc-summary-wrapper">
                <div class="modal-inner-wrap">
                    <div class="modal-content">
                        <div id="opc-sidebar">
                            <div class="opc-block-summary">
                                <h2 class="title">Giỏ hàng </h2>
                                
                                <div class="block items-in-cart">
                                    <div class="title">
                                        <strong role="heading">
                                           <span>{{count($product)}}</span>
                                           <span>Sản phẩm </span>
                                        </strong>
                                    </div>
                                    <div class="content minicart-items">
                                        <div class="minicart-items-wrapper overflowed">
                                           <ul class="minicart-items">
                                            <?php $total=0;?>
                                            @foreach($product as $p)
                                                <li class="product-item">
                                                    <div class="product">
                                                        <span class="product-image-container"style="height: 75px; width: 75px;">
                                                            <span class="product-image-wrapper">
                                                                <img src="/public/upload/product/small/{{$p['product']['picture']}}" width="75" height="75" alt="{{$p['product']['name']}}">
                                                            </span>
                                                        </span>
                                                        <div class="product-item-details">
                                                            <div class="product-item-inner">
                                                                <div class="product-item-name-block">
                                                                    <a href="/{{$p['product']['cate_alias']}}/{{$p['product']['alias']}}" class="product-item-name">{{$p['product']['name']}}
                                                                    </a>
                                                                    <div class="details-qty">
                                                                        <span class="label">
                                                                           <span>Số lượng </span>
                                                                        </span>
                                                                        <span class="value">{{$p['limited']}}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="subtotal">
                                                                    <span class="price-excluding-tax">
                                                                        <span class="cart-price">
                                                                            <span class="price">{{App\MrData::toPrice($p['product']['price'])}}</span>
                                                                        </span>
                                                                     </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php $total=$total+$p['product']['price']*$p['limited'];?>
                                                @endforeach 
                                            </ul>
                                        </div>
                                    </div>
                                      @if(Auth::check() && !empty($Payment['match']))
                                       <?php $total=$total-$Payment['match']*1;?>
                                      @endif
                                    <table class="data table table-totals">
                                    <caption class="table-caption">Tổng đơn hàng.</caption>
                                    <tbody>
                                        <tr class="totals sub">
                                            <th class="mark" scope="row"> Tổng: </th>
                                            <td class="amount">
                                                <span class="price">{{App\MrData::toPrice($total)}}</span>
                                            </td>
                                        </tr>
                                        @if(Auth::check() && !empty($Payment['match']))
                                        <tr class="totals shipping excl">
                                            <th class="mark" scope="row">
                                                <span class="label"></span>
                                                <span class="value">Số tiền giảm:</span>
                                            </th>
                                            <td class="amount">
                                                <span class="price">-{{App\MrData::toPrice($Payment['match'])}}</span>
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </section>


@endsection
