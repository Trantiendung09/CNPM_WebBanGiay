<div class="cc">
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
                <a href="#" data-url="{{route('addToCart',['id'=>$s->id])}}" class="btn btn-default add-to-cartt"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            <div class="product-overlay">
                <div class="overlay-content">
                    <h2>{{$s->price}}</h2>
                    <p>{{$s->name}}</p>
                    <a href="#" data-url="{{route('addToCart',['id'=>$s->id])}}" class="btn btn-default add-to-cartt"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
            </div>

        </div>
        <div class="choose" style="border-top: 1px solid #F7F7F0; background-color:#F7F7F0">
            <ul class="nav nav-pills nav-justified" style="background-color:#F7F7F0">
                <li style="background-color:#F7F7F0"><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                <li style="background-color:#F7F7F0"><a href="{{route('home.detail',$s->id)}}"><i class="fa fa-plus-square"></i>Detail</a></li>
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
                var url = $('input.search').data('url');
                //alert(a);
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {
                        name: a
                    },
                    success: function(data) {
                        $('div.s').html(data.view);
                        alert('d');
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
            $('.add-to-cartt').on('click', addTocart);
            $('input.search').keypress(search);
            $('a.category_menu').on('click', category_menu);
        })
        
    </script>
</div>