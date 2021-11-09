@extends('layout.test')
@section('content')
<section id="cart_items">
    <div class="container1">
     @include('layout.cart_product')
    <div>
</section>
<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="signup-form" style="border:1px solid #E6E4DF;">
                    <!--sign up form-->
                    <h2>Nhập thông tin của bạn</h2>
                    <form action="" class="information" data-url="{{route('thanhtoan')}}">
                        <input class="input_name" type="text" placeholder="Name" name="name" value="">
                        <input class="input_fullname" type="text" placeholder="fullname" name="fullname" value="">
                        <input class="input_email" type="email" placeholder="Email Address" name="email" value="">
                        <input class="input_phone" type="text" placeholder="phone" name="phone" value="">
                        <input class="input_adress" type="text" placeholder="adress" name="adress" value="">
                        <button type="submit" value="Submit" class="btn btn-default muahang">Mua hàng</button>
                    </form>
                    <br><br>
                </div>
                <!--/sign up form-->
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span class="total" data-total="{{$total}}">{{$total}}</span></li>
                        <li>Eco Tax <span>$2</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span class="total">{{$total}}</span></li>
                    </ul>
                    <a class="btn btn-default update" href="{{route('thanhtoan')}}">Thanh Toán</a>
                    <a class="btn btn-default check_out" href="">Check Out</a>
                </div>
            </div>

        </div>
    </div>
</section>
<script src="{{asset('public/fontend/js/jquery.js')}}"></script>
<script src="{{asset('public/fontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/fontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('public/fontend/js/price-range.js')}}"></script>
<script src="{{asset('public/fontend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('public/fontend/js/main.js')}}"></script>
<script>
    function updatecart(event) {
        event.preventDefault();
        // alert( $(this).data('id'));
        let url = $('.cart_info').data('url');
        let id = $(this).data('id');
        let quantity = $(this).parents('tr').find('.cart_quantity_input').val();
        $('.'+id).html($(this).parents('tr').find('.cart_quantity_input').val()*$(this).data('price'));
        $.ajax({
            type: "GET",
            url: url,
            data: {
                id: id,
                quantity: quantity
            },
            success: function(data) {
                alert('cap nhap hanh cong')
                //$carts=data.carts;
                $('.container1').html(data.cart_product);
                $('.total').html(data.total);
            },
            error: function() {}
        })
    }

    function buy(event) {
        event.preventDefault();
        var ten=$(this).parents('form').find('.input_name').val();
        if(ten=="")
        {
            alert('loi');
            $(this).parents('form').find('.input_name').focus();
            return false;
        }
        let total=$('.total').data('total');
        let name = $(this).parents('form').find('.input_name').val();
        let fullname = $(this).parents('form').find('.input_fullname').val()
        let email = $(this).parents('form').find('.input_email').val()
        let phone = $(this).parents('form').find('.input_phone').val()
        let adress = $(this).parents('form').find('.input_adress').val()
        url = $('.information').data('url');
        // alert(name);
        $.ajax({
                type: 'GET',
                url: url,
                data: {
                    name: name,
                    fullname: fullname,
                    email: email,
                    phone: phone,
                    adress: adress,
                    total:total
                },
                success: function(data) {
                    alert(data.s);
                    $('h1.test').html(data.s);
                },
                error: function() {}

            }

        )
    }
    function deletecart(event)
    {
        event.preventDefault();
        let id = $(this).data('id');
        let url = $('.cart_info').data('url2');
        $('.xoa_'+id).html('')
        $.ajax({
            type: "GET",
            url: url,
            data: {
                id: id,
            },
            success: function(data) {
                alert('cap nhap hanh cong')
                //$carts=data.carts;
                $('.container1').html(data.cart_product);
                $('.total').html(data.total);
            },
            error: function() {}
        })
    }
    $(function() {
        $('a#cart_update').on('click', updatecart);
        $(document).on('click', 'a#cart_delete', deletecart);
        $('.muahang').on('click', buy)
    })
</script>
@endsection 