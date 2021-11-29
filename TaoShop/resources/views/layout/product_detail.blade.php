<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Home | Táo Store</title>
	<link href="{{asset('public/fontend/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/fontend/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/fontend/css/prettyPhoto.css')}}" rel="stylesheet">
	<link href="{{asset('public/fontend/css/price-range.css')}}" rel="stylesheet">
	<link href="{{asset('public/fontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/fontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/fontend/css/responsive.css')}}" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->       
	<link rel="shortcut icon" href="images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
     @include('layout/header')
	</header><!--/header-->
    {{-- section top --}}
	<section>
		<div class="container">
			<div class="row">
				@include('layout.left')
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{asset('public/fontend/images/product-details')}}/{{$sps->photo->photo_n1}}" alt="">
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item">
										  <a href=""><img style="height: 85px; width: 90px;" src="{{asset('public/fontend/images/product-details')}}/{{$sps->photo->photo_n1}}" alt=""></a>
										  <a href=""><img style="height: 85px; width: 90px;" src="{{asset('public/fontend/images/product-details')}}/{{$sps->photo->photo_n2}}" alt=""></a>
										  <a href=""><img style="height: 85px; width: 90px;" src="{{asset('public/fontend/images/product-details')}}/{{$sps->photo->photo_n3}}" alt=""></a>
										</div>
										<div class="item">
                                        <a href=""><img style="height: 85px; width: 90px;" src="{{asset('public/fontend/images/product-details')}}/{{$sps->photo->photo_n1}}" alt=""></a>
										  <a href=""><img style="height: 85px; width: 90px;" src="{{asset('public/fontend/images/product-details')}}/{{$sps->photo->photo_n2}}" alt=""></a>
										  <a href=""><img style="height: 85px; width: 90px;" src="{{asset('public/fontend/images/product-details')}}/{{$sps->photo->photo_n3}}" alt=""></a>
										</div>
										<div class="item active">
                                        <a href=""><img style="height: 85px; width: 90px;" src="{{asset('public/fontend/images/product-details')}}/{{$sps->photo->photo_n1}}" alt=""></a>
										  <a href=""><img style="height: 85px; width: 90px;" src="{{asset('public/fontend/images/product-details')}}/{{$sps->photo->photo_n2}}" alt=""></a>
										  <a href=""><img style="height: 85px; width: 90px;" src="{{asset('public/fontend/images/product-details')}}/{{$sps->photo->photo_n3}}" alt=""></a>
										</div>
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="">
								<h2>{{$sps->name}}</h2>
								<p>Mã sản phẩn: <span>{{$sps->id}}</span> </p>
								<img src="images/product-details/rating.png" alt="">
									<span>
										<span>{{$sps->price}}VNĐ</span>
										<a type="button" data-url="{{route('addToCart',['id'=>$sps->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
									</span>
								<p><b>Tình trạng: </b>
                                @if($sps->quantity>0) 
                                còn hàng
                                @else
                                hết hàng
                                @endif
                                </p>
								<p><b>Thương hiệu: </b>{{$sps->brand->name}}</p>
								<p>
									<b>Mô tả:</b>
									@if($sps->note=='') 
									chưa có cập nhật 
									@else
								    {{$sps->note}}
								@endif
							    </p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive" alt=""></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
							
					<div class="recommended_items"><!--recommended_items-->
						<p class="title text-center" style="color: #FE980F;
    font-family: 'Roboto', sans-serif;
    font-size: 18px;
    font-weight: 700;
    margin: 0 auto 30px;
    text-align: center;
    text-transform: uppercase;
    position: relative;
    z-index: 3;">Sản phẩm tương tự</p>						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item">	
									@for ($i = 0; $i < 3; $i++)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{asset('public/fontend/images/product-details')}}/{{$list[$i]->photo->photo_n1}}" alt="">
													<h2>{{$list[$i]->price}}</h2>
													<p>{{$list[$i]->name}}</p>
													<a type="button" data-url="{{route('addToCart',['id'=>$list[$i]->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
												</div>
											</div>
										</div>
									</div>
									@endfor
								</div>
								<div class="item active">	
									@for ($i = 3; $i < 6; $i++)
								<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{asset('public/fontend/images/product-details')}}/{{$list[$i]->photo->photo_n1}}" alt="">
												<h2>{{$list[$i]->price}}</h2>
												<p>{{$list[$i]->name}}</p>
												<a type="button" data-url="{{route('addToCart',['id'=>$list[$i]->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
											</div>
										</div>
									</div>
								</div>
								@endfor
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
				</div>
			</div>
		</div>
	</section>
	<footer id="footer"><!--Footer-->
     @include('layout/footer')
	</footer><!--/Footer-->
    <script src="{{asset('public/fontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/fontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/fontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/fontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/fontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/fontend/js/main.js')}}"></script>
	<script>
		 function addTocart(event) {
            event.preventDefault();
            var urlCart = $(this).data('url');
            $.ajax({
                type: "GET",
                url: urlCart,
                dataType: 'json',
                success: function(data) {
					alert('Thêm thành công sản phẩm vào giỏ hàng');
				},
                error: function() {
					alert('Thêm sản phẩm vào giỏ hàng thất bại');
                },
            });
        }
		$(document).ready(function() {
            $('a.add-to-cart').on('click', addTocart);

            // $('input.search').keypress(search);
            // $('a.category_menu').on('click', category_menu);
        })
	</script>
</body>
</html>
