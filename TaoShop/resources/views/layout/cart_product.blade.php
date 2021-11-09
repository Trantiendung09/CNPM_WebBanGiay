<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Shopping Cart</li>
    </ol>
</div>
<div class="table-responsive cart_info" data-url="{{route('updatecart')}}" data-url2="{{route('deletecart')}}">
    <table class="table table-condensed" style="width: 1160px;">
        <thead>
            <tr class="cart_menu">
                <td class="image">Item</td>
                <td class="description"></td>
                <td class="price">Price</td>
                <td class="quantity">Quantity</td>
                <td class="totall">Total</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0
            ?>
            @foreach($carts as $id=> $cart)
            <?php
            $total += $cart['price'] * $cart['quantity'];
            ?>
            <tr class="xoa_{{$id}}">
                <td class="cart_product">
                    <a href=""><img src="images/cart/three.png" alt=""></a>
                </td>
                <td class="cart_description">
                    <h4><a href="">{{$cart['name']}}</a></h4>
                    <p>Web ID: {{$id}}</p>
                </td>
                <td class="cart_price">
                    <p>{{$cart['price']}}</p>
                </td>
                <td class="cart_quantity">
                    <div class="cart_quantity_button">
                        <a class="cart_quantity_up" href=""> + </a>
                        <input class="cart_quantity_input" type="text" name="quantity" value="{{$cart['quantity']}}" autocomplete="off" size="2">
                        <a class="cart_quantity_down" href=""> - </a>
                    </div>
                </td>
                <td class="cart_total">
                    <p class="cart_total_price {{$id}}">{{$cart['quantity']*$cart['price']}}</p>
                </td>
                <td>
                    <a title="cập nhật" style="margin-right: 20px;" id="cart_update" data-id='{{$id}}' data-price="{{$cart['price']}}" href=""><i class="fa fa-refresh"></i></a>
                    <!-- <button style="margin-right: 20px;" id="cart_update" data-id='{{$id}}'><i class="fa fa-refresh"></i></a> -->
                    <!-- <a style="margin-right: 20px;" id="cart_update" data-id='{{$id}}' href=""><i class="fa fa-refresh"></i></a> -->
                    <a title="xóa"  id="cart_delete" data-id='{{$id}}' href=""><i class="fa fa-times"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>