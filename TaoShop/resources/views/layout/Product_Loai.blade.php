@extends('welcome')
@section('content')
<div class="features_items">
    <!--features_items-->
    <h2 class="title text-center">{{$name}}</h2>
    <div class="s">
        @foreach($sp as $s)
        <div class="col-sm-4" style="width: 200px; height:100%">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img style="height: 170px;" src="{{asset('public/fontend/images/product-details')}}/{{$s->photo->photo_n1}}" alt="" />
                        <!-- src="public/fontend/images/product-details/{{$s->photo->photo_n1}}" -->
                        <!-- src="public/fontend/images/product-details/1.png" -->
                        <h2 style="height: 20px;">{{$s->price}}</h2>
                        <p style="height: 50px;">{{$s->name}}</p>
                        <a href="#" data-url="{{route('addToCart',['id'=>$s->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
    </div>
    <hr>
    {{$sp->links()}}
</div>
<!--features_items-->
<div class="category-tab">
    <!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach($category as $ca)
            <li><a href="#" class="category_menu" data-url="{{route('category_menu',['id'=>$ca->id])}}" >{{$ca->name}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in menu_vip" id="tshirt">
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div id="menu">
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

        </div>

        <div class="tab-pane fade" id="blazers">

        </div>

        <div class="tab-pane fade" id="sunglass">

        </div>

        <div class="tab-pane fade" id="kids">

        </div>

        <div class="tab-pane fade" id="poloshirt">

        </div>
    </div>
</div>
<!--/category-tab-->
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
            var urlCart = $(this).data('url');
            $.ajax({
                type: "GET",
                url: urlCart,
                dataType: 'json',
                success: function(data) {},
                error: function() {

                }
            })
        }
        function search(event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                let a = $('input.search').val();
                let url = "{{ route('search', ':id') }}";
                url = url.replace(':id', a);
                //var url = $('input.search').data('url');
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function(data){
                        $('div.features_items').html(data);
                        alert('done');
                    },
                    error: function() {}
                })
            }
        }
        function category_menu(event)
        {
            event.preventDefault();
            url=$(this).data('url');
            $.ajax({
                    type: "GET",
                    url: url,
                    success: function(data) {
                        $('div.menu_vip').html(data);
                        // alert('dm');
                    },
                    error: function() {}
                })
        }
        $(document).ready(function() {
            $('a.add-to-cart').on('click', addTocart);
            $('input.search').keypress(search);
            $('a.category_menu').on('click', category_menu);
        })
        
    </script>
<div class="recommended_items">
    <!--recommended_items-->
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
</div>
<!--/recommended_items-->
@endsection