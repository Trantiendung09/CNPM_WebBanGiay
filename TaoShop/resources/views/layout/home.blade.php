@extends('welcome')
@section('content')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Features Items</h2>
    @foreach($sp as $s)
    <div class="col-sm-4" style="width: 200px; height:100%">
        <div class="product-image-wrapper">
            <div class="single-products">
                    <div class="productinfo text-center">
                        <img style="height: 170px;" src="public/fontend/images/product-details/{{$s->photo->photo_n1}}" alt="" />
                        <h2 style="height: 20px;" >{{$s->price}}</h2>
                        <p style="height: 50px;">{{$s->name}}</p>
                        <a href="#"  data-url="{{route('addToCart',['id'=>$s->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>{{$s->price}}</h2>
                            <p>{{$s->name}}</p>
                            <a href="#" data-url="{{route('addToCart',['id'=>$s->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
               
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                    <li><a href="{{route('home.detail',$s->id)}}"><i class="fa fa-plus-square"></i>Detail</a></li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach
    <script src="{{asset('public/fontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/fontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/fontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/fontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/fontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/fontend/js/main.js')}}"></script>
	<script>
    function addTocart(event) {
        alert('da them san pham vao gio hang');
        event.preventDefault();
        var urlCart=$(this).data('url');
        $.ajax({
            type: "GET",
            url: urlCart,
            dataType: 'json',
            success: function (data)
            {
            },
            error: function()
            {

            }
        })
    }
    $(document).ready(function() {
        $('.add-to-cart').on('click', addTocart);
    })
</script>
</div><!--features_items-->
<div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
            <li><a href="#blazers" data-toggle="tab">Blazers</a></li>
            <li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
            <li><a href="#kids" data-toggle="tab">Kids</a></li>
            <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="tshirt" >
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery1.jpg" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        
        </div>
        
        <div class="tab-pane fade" id="blazers" >
           
        </div>
        
        <div class="tab-pane fade" id="sunglass" >
           
        </div>
        
        <div class="tab-pane fade" id="kids" >
           
        </div>
        
        <div class="tab-pane fade" id="poloshirt" >
           
        </div>
    </div>
</div><!--/category-tab-->
<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">recommended items</h2>
    
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">	
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/recommend1.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">	
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/recommend1.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
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
@endsection
