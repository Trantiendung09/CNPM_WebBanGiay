<div>
<h2 class="title text-center">search result</h2>
    @foreach($sp as $s)
    <div class="col-sm-4" style="width: 200px; height:100%">
        <div class="product-image-wrapper">
            <div class="single-products">
                    <div class="productinfo text-center">
                    <img style="height: 170px;" src="{{asset('public/fontend/images/product-details')}}/{{$s->photo->photo_n1}}" alt="" />
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
</div>