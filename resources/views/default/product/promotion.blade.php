@extends("default.index")
@section('css')
	<link rel="stylesheet" type="text/css" media="all" href="/public/default/cate/css/index.css">
@endsection
@section("contents")
	 <section id="maincontent" class="page-main page-layout-2columns-left ">
        <div class="breadcrumbs">
            <div class="page-main">
                <h1>tất cả sản phẩm  </h1>
                <ul class="items">
                    <li class="item home">
                        <a href="/" title="Trang chủ ">Trang chủ </a>
                    </li>
                    <li class="item">
                        <a href="" title="tất cả sản phẩm ">tất cả sản phẩm </a>
                    </li>
                    
                </ul>
            </div>
        </div>
        <div class="columns">
            <div class="column main" style="width: 100%">
                <div class="style-home3 style-homepage fresh_layout3_home">
                   
                    <div class="toolbar toolbar-products">
                        <div class='text text-left style-inline'> 
                            có <span class="text text-danger">{{$TProduct->total()}}</span> sản phẩm khuyến mãi 
                        </div>
                        <div class="toolbar-sorter sorter">
                            
                          
                        </div>
                            
                        <div class="field limiter">
                           
                        </div>
                    </div>
                    <div id='content-main'  class="products wrapper single-line-name grid products-grid">
                        <ul class="products list items product-items">
                            @foreach($TProduct as $product)
                              <?php 
                                    $product=(array)$product; 
                                 $product=App\Product::getPrice($product);
                             ?>
                            <li class="item product product-item">
                                <div class="product-block">
                                    <div class="product-item-info">
                                        <div class="product-image">
                                            <div class="product-img">
                                                <a href="/{{$product['cate_alias']}}/{{$product['alias']}}" title="{{$product['name']}}" class="product-item-photo">
                                                    <img src="/public/upload/product/big/{{$product['picture']}}" alt="{{$product['name']}}">
                                                </a>
                                                @if($otherPic=App\Product::otherPic($product['multi_picture']))
                                                <a href="/{{$product['cate_alias']}}/{{$product['alias']}}" title="{{$product['name']}}" class="hover-image">
                                                    <img src="/public/upload/product/big/{{$otherPic}}" alt="{{$product['name']}}">
                                                </a>
                                                @endif
                                            </div>
                                            <div class="icon">
                                                 @if($percent=App\Product::Percent($product['sale_price'],$product['price']))
                                                         <span class="onsale"><span>-{{$percent}}%</span> </span>
                                                 @endif
                                                 @if(!empty($product['promo']))
                                                            <span class="new-icon"><span>Khuyến mãi </span></span>
                                                  @endif
                                            
                                            </div>
                                           
                                        </div>
                                        <div class="product-item-details">
                                            <div class="product-item-name">
                                                <a class="product-item-link" href="/{{$product['cate_alias']}}/{{$product['alias']}}" title="{{$product['name']}}">{{$product['name']}}</a>
              <div class="product-reviews-summary short empty">
                                 <div class="rating-summary">
                               <div class="rating-result" title="{{$product['ranting']}}%">
                                      <span style="width:{{$product['ranting']}}%"><span>{{$product['ranting']}}%</span></span>
                                   </div>
                            </div>
                                                                                                           
                         </div>                           
                            </div>
                                            
                                            <div class="actions-primary">
                        {!! Form::open(['method'=>'post','url'=>'/gio-hang']) !!}
                                           <input type="hidden" name="limited" value="1">
                                              <input type="hidden" name="product" value="{{$product['id']}}">
                                                                                                               
                                             <button type="submit" title="Add to Cart" class="action add-to-cart">
                                                 <i class="fa fa-shopping-basket"></i>
                                              </button>
                         {!! Form::close() !!}
                                                <div class="price-box price-final_price">
                                                    <span class="price-container price-final_price tax weee">
                                                        <span class="price-wrapper ">
                                                            <span class="price">{{App\MrData::toPrice($product['price'])}}</span>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                  
                    <div class="main_pagination">
                         {!!$TProduct->appends($search)->render()!!}
                       
                    </div>
                    
                </div>
            </div>
            
          
        </div>
    </section>


@endsection
@section("js")
    <script type="text/javascript">
        $(document).ready(function(){
            var url="<?php echo (stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://').$_SERVER["SERVER_NAME"]."/san-pham"?>";
                 if(window.location.search != undefined && window.location.search !==""){
                        $("body,html").animate({scrollTop:200},1000);
                        $(".main_pagination").children("ul").children("li").children("a").click(function(){
                            $("body").load($(this).attr("href"));
                            return false;
                        });
                   }
            function myfilter(){
                
                var param=new Array();
                $(".filter_active").each(function(k,v){
                    param.push($(this).attr("ajax"));
                  
                });
                $(".myfilterselect").each(function(k,v){
                    if($(this).val() !== ""){
                        if(param.indexOf($(this).val())===-1){
                            param.push($(this).val());
                        }
                        
                    }
                    console.log(param);
                });
                $("body").addClass("sidebar-main-opacity");
                $.ajax({
                    type:"GET",
                    url:url+"?"+param.join("&"),
                    success:function(result){
                        $("body").hide().html(result).removeClass("sidebar-main-opacity").show();
                    }
                });
                return true;
            }
            
            $(".myfilter").click(function(){
                if($(this).hasClass("filter_active")){
                    $(this).removeClass("filter_active");
                    $(this).parent().next().hide();
                }else{
                    $(this).addClass("filter_active");
                     $(this).parent().next().show();
                }
               if(window.location.search != undefined && window.location.search !==""){
                    if(!$(".myfilter").hasClass("filter_active") && !$(".myfilterselect").hasClass("filter_active")){
                        window.location.href=url;
                    }
                    myfilter();
                  return false;   
                }
                
                  
            });
            $(".myfilterselect").change(function(){
                if($(this).hasClass("filter_active")){
                    $(this).removeClass("filter_active");
                    $(this).attr("ajax",$(this).val());
                }else{
                    $(this).addClass("filter_active");
                     $(this).parent().next().show();
                     $(this).attr("ajax",$(this).val());
                }
                if(window.location.search != undefined && window.location.search !==""){
                    if(!$(".myfilter").hasClass("filter_active") && !$(".myfilterselect").hasClass("filter_active")){
                        window.location.href=url;
                    }
                    myfilter();
                  return false;   
                }else{
                    window.location.href=url+"?"+$(this).val();
                }

            });
        });
    </script>
@endsection