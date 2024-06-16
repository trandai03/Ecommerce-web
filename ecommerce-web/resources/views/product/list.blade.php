@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{url('assets/css/plugins/owl-carousel/owl.carousel.css')}}">
<link rel="stylesheet" href="assets/css/plugins/magnific-popup/magnific-popup.css">
<link rel="stylesheet" href="{{url('assets/css/plugins/nouislider/nouislider.css')}}">
<style type="text/css">
    .active-color {
        border: 3px solid #000 !important;
    }
</style>
@endsection
@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('{{ url('')}}/assets/images/page-header-bg.jpg')">
        <div class="container">
            @if(!empty($getSubCategory))
                <h1 class="page-title">{{$getSubCategory->name}}</h1>
            @else
                <h1 class="page-title">{{$getCategory->name}}</h1>
            @endif
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                @if(!empty($getSubCategory))
                    <li class="breadcrumb-item active" aria-current="page"><a
                            href="{{url($getCategory->slug)}}">{{$getCategory->name}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$getSubCategory->name}}</li>

                @else
                    <li class="breadcrumb-item active" aria-current="page">{{$getCategory->name}}</li>

                @endif
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="toolbox">
                        <div class="toolbox-left">
                            <div class="toolbox-info">
                                Showing <span>9 of 56</span> Products
                            </div><!-- End .toolbox-info -->
                        </div><!-- End .toolbox-left -->

                        <div class="toolbox-right">
                            <div class="toolbox-sort">
                                <label for="sortby">Sort by:</label>
                                <div class="select-custom">
                                    <select name="sortby" id="sortby" class="form-control ChangeSortBy">
                                        <option value="">Select</option>
                                        <option value="popularity">Most Popular</option>
                                        <option value="rating">Most Rated</option>
                                        <option value="date">Date</option>
                                    </select>
                                </div>
                            </div><!-- End .toolbox-sort -->

                        </div><!-- End .toolbox-right -->
                    </div><!-- End .toolbox -->

                    <div class="products mb-3">
                        <div class="row justify-content-center">
                            @foreach($getProduct as $value)
                                                        @php
                                                            $getProductImage = $value->getImageSingle($value->id)
                                                        @endphp
                                                        {{$getProductImage->image_name}}
                                                        <div class="col-12 col-md-4 col-lg-4">
                                                            <div class="product product-7 text-center">
                                                                <figure class="product-media">

                                                                    <a href="{{$value->slug}}">
                                                                        @if(!empty($getProductImage) && !empty($getProductImage->getLogo()))
                                                                            <img style="height: 280px;width: 100%;object-fit: cover;"
                                                                                src="{{$getProductImage->getLogo()}}" alt="{{$value->title}}"
                                                                                class="product-image">
                                                                        @endif
                                                                    </a>

                                                                    <div class="product-action-vertical">
                                                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add
                                                                                to wishlist</span></a>

                                                                    </div><!-- End .product-action-vertical -->

                                                                    <div class="product-action">
                                                                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                                                    </div><!-- End .product-action -->
                                                                </figure><!-- End .product-media -->

                                                                <div class="product-body">
                                                                    <div class="product-cat">
                                                                        <a
                                                                            href="{{url($value->category_slug . '/' . $value->sub_category_slug)}}">{{$value->sub_category_name}}</a>
                                                                    </div><!-- End .product-cat -->
                                                                    <h3 class="product-title"><a href="{{url($value->title)}}"></a></h3>
                                                                    <!-- End .product-title -->
                                                                    <div class="product-price">
                                                                        ${{number_format($value->price, 2)}}
                                                                    </div><!-- End .product-price -->
                                                                    <div class="ratings-container">
                                                                        <div class="ratings">
                                                                            <div class="ratings-val" style="width: 20%;"></div>
                                                                            <!-- End .ratings-val -->
                                                                        </div><!-- End .ratings -->
                                                                        <span class="ratings-text">( 2 Reviews )</span>
                                                                    </div><!-- End .rating-container -->
                                                                </div><!-- End .product-body -->
                                                            </div><!-- End .product -->
                                                        </div><!-- End .col-sm-6 col-lg-4 -->
                            @endforeach
                            <div class="col-6 col-md-4 col-lg-4">
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="{{ url('')}}/assets/images/products/product-10.jpg"
                                                alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add
                                                    to wishlist</span></a>
                                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                                title="Quick view"><span>Quick view</span></a>
                                            <a href="#" class="btn-product-icon btn-compare"
                                                title="Compare"><span>Compare</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">Jumpers</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">Yellow button front tea top</a>
                                        </h3><!-- End .product-title -->
                                        <div class="product-price">
                                            $56.00
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 0%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 0 Reviews )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-lg-4 -->
                        </div><!-- End .row -->
                    </div><!-- End .products -->
                    {!! $getProduct->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

                </div><!-- End .col-lg-9 -->
                <aside class="col-lg-3 order-lg-first">
                    <form id="FilterForm" method="post" action="">
                        {{csrf_field()}}
                        <input type="text" name="sub_category_id" id="get_sub_category_id">
                        <input type="text" name="brand_id" id="get_brand_id">
                        <input type="text" name="color_id" id="get_color_id">
                        <input type="text" name="sort_by_id" id="get_sort_by_id">

                    </form>
                    <div class="sidebar sidebar-shop">
                        <div class="widget widget-clean">
                            <label>Filters:</label>
                            <a href="#" class="sidebar-filter-clear">Clean All</a>
                        </div><!-- End .widget widget-clean -->

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true"
                                    aria-controls="widget-1">
                                    Category
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-1">
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">
                                        @foreach($getSubCategoryFilter as $f_category)
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input ChangeCategory"
                                                        value="{{$f_category->id}}" id="cat-{{$f_category->id}}">
                                                    <label class="custom-control-label"
                                                        for="cat-{{$f_category->id}}">{{$f_category->name}}</label>
                                                </div><!-- End .custom-checkbox -->
                                                <span class="item-count">{{ $f_category->TotalProduct() }}</span>
                                            </div><!-- End .filter-item -->
                                        @endforeach
                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true"
                                    aria-controls="widget-2">
                                    Size
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-2">
                                <div class="widget-body">
                                    <div class="filter-items">
                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="size-1">
                                                <label class="custom-control-label" for="size-1">XS</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="size-2">
                                                <label class="custom-control-label" for="size-2">S</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" checked id="size-3">
                                                <label class="custom-control-label" for="size-3">M</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" checked id="size-4">
                                                <label class="custom-control-label" for="size-4">L</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="size-5">
                                                <label class="custom-control-label" for="size-5">XL</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="size-6">
                                                <label class="custom-control-label" for="size-6">XXL</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->
                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true"
                                    aria-controls="widget-3">
                                    Color
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-3">
                                <div class="widget-body">
                                    <div class="filter-colors">
                                        @foreach($getColor as $f_color)
                                            <a href="javascript:;" class="ChangeColor" data-val="0" id="{{$f_color->id}}"
                                                style="background: {{$f_color->code}};"><span
                                                    class="sr-only">{{$f_color->name}}</span></a>
                                        @endforeach

                                    </div><!-- End .filter-colors -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true"
                                    aria-controls="widget-4">
                                    Brand
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-4">
                                <div class="widget-body">
                                    <div class="filter-items">
                                        @foreach($getBrand as $f_brand)
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input ChangeBrand"
                                                        value="{{$f_brand->id}}" id="brand-{{$f_brand->id}}">
                                                    <label class="custom-control-label"
                                                        for="brand-{{$f_brand->id}}">{{$f_brand->name}}</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->
                                        @endforeach
                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true"
                                    aria-controls="widget-5">
                                    Price
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-5">
                                <div class="widget-body">
                                    <div class="filter-price">
                                        <div class="filter-price-text">
                                            Price Range:
                                            <span id="filter-price-range"></span>
                                        </div><!-- End .filter-price-text -->

                                        <div id="price-slider"></div><!-- End #price-slider -->
                                    </div><!-- End .filter-price -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->
                    </div><!-- End .sidebar sidebar-shop -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection
@section('script')
<script src="{{url('assets/js/wNumb.js')}}"></script>
<script src="{{url('assets/js/bootstrap-input-spinner.js')}}"></script>
<script src="{{url('assets/js/nouislider.min.js')}}"></script>
<script type="text/javascript">
    $('.ChangeSortBy').change(function () {
        var id = $(this).val();
        $('#get_sort_by_id').val(id);
        FilterForm();
    });
    $('.ChangeCategory').change(function () {
        var ids = '';
        $('.ChangeCategory').each(function () {

            if (this.checked) {
                var id = $(this).val();

                ids += id + ',';
            }
        });
        $('#get_sub_category_id').val(ids);
        FilterForm();

    });

    $('.ChangeBrand').change(function () {
        var ids = '';
        $('.ChangeBrand').each(function () {
            if (this.checked) {
                var id = $(this).val();
                ids += id + ',';
            }
        });

        $('#get_brand_id').val(ids);
        FilterForm();

    });

    $('.ChangeColor').click(function () {
        var id = $(this).attr('id');
        var status = $(this).attr('data-val');
        if (status == 0) {
            $(this).attr('data-val', 1);
            $(this).addClass('active-color')
        } else {
            $(this).attr('data-val', 0);

            $(this).removeClass('active-color')
        }
        var ids = '';
        $('.ChangeColor').each(function () {
            var status = $(this).attr('data-val');

            if (status == 1) {
                var id = $(this).attr('id');

                ids += id + ',';
            }
        });
        $('#get_color_id').val(ids);
        FilterForm();

    });
    function FilterForm(){
        var formData = $('#FilterForm').serialize();

        console.log('Form Data:', formData); // Lo
        $.ajax({
            type:"POST",
            url:"{{url('get_filter_product_ajax')}}",
            data: $('#FilterForm').serialize(),
            dataType:"json",
            success:function (data){

            },
            error:function (data) {

            }
        });
    }
</script>
@endsection
