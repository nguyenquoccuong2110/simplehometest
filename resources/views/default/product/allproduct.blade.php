@extends("default.index")
@section('css')
	<link rel="stylesheet" type="text/css" media="all" href="/public/default/allproduct/cate.css">
@endsection
@section('js')
    
    <script src="/public/default/allproduct/cate.js"></script>
@endsection
@section("contents")
	   <div class="page-container">
                <div class="page-content-wrapper cateproduct">
                    <div class="container swin-btn-wrap center">
                        <h1><span class="swin-btn center form-submit"> <span>   All CATEGORY </span></span></h1>
                        <section class="gallery-section-01">
                            <div class="swin-sc swin-sc-isotope">
                                <div class="grid animated zoomIn">
                                    <div class="grid-sizer col-sm-1"></div>
                                    <?php 
                                    $list_style=array(
                                        "col-sm-3 grid-item-h2",
                                        "col-sm-4 grid-item-h1",
                                        "col-sm-2 grid-item-h1",
                                        "col-sm-3 grid-item-h2",
                                        "col-sm-2 grid-item-h1",
                                        "col-sm-4 grid-item-h1",
                                        "col-sm-3 grid-item-h2",
                                        "col-sm-2 grid-item-h1",
                                        "col-sm-4 grid-item-h1",
                                        "col-sm-3 grid-item-h2",
                                        "col-sm-4 grid-item-h1",
                                        "col-sm-2 grid-item-h1"
                                    );
                                    ?>

                                    @foreach($TCate as $k=>$cate)
                                    <div class="grid-item {{$list_style[$k]}} " title="{{$cate['name']}}">
                                        <div class="grid-wrap-item">
                                            <a href="/{{$cate['alias']}}" class="gallery-title title">{{$cate['name']}}</a>
                                            <div class="img-wrap">
                                                <img src="/public/upload/cate/{{$cate['picture']}}" alt="{{$cate['name']}}" class="img img-responsive">
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
@endsection