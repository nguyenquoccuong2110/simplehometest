@extends("default.index")
@section('css')
    <link rel="stylesheet" type="text/css" media="all" href="/public/default/product/product.css">
@endsection
@section("js")
    <script type="text/javascript" src="/public/default/product/product.js"></script>
@endsection
@section("contents")
     <div class="page-container">
                <div class="page-content-wrapper cateproduct">
                    <div class="container swin-btn-wrap center">
                        <div class="row col_showproduct">
                            <div class="col-sm-12">
                                <h1><span class="swin-btn center form-submit"> <span>PRODUCTS ({{$Product->total()}}) </span></span></h1>
                                <div class="row">
                                    @foreach($Product as $product)
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                         <div data-wow-delay="0s" class="blog-item swin-transition item wow fadeInUpShort">
                                            <div class="blog-featured-img">
                                                <a href="/{{$product->Cate()->alias}}/{{$product['alias']}}"  title="{{$product['name']}}"><img src="/public/upload/product/big/{{$product['picture']}}" alt="{{$product['name']}}" class="img img-responsive"></a>
                                            </div>
                                            <div class="blog-content">
                                                <h3 class="blog-title">
                                                      <a href="/{{$product->Cate()->alias}}/{{$product['alias']}}" class="swin-transition" title="{{$product['name']}}">
                                                        {{$product['name']}}</a>
                                                </h3>
                                                <div class="blog-readmore">
                                                    <a href="/{{$product->Cate()->alias}}/{{$product['alias']}}"  class="swin-transition" title="{{$product['name']}}">Read More 
                                                        <i class="fa fa-angle-double-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-sm-12 btn_showmore">
                                   {!!$Product->render()!!}
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
@endsection