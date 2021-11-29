@extends('layout.test')
@section('content')
<p class="title text-center" style=" color: #FE980F;
    font-family: 'Roboto', sans-serif;
    font-size: 18px;
    font-weight: 700;
    margin: 0 auto 30px;
    text-align: center;
    text-transform: uppercase;
    position: relative;
    z-index: 3; margin-top:0px">Mua hàng thành công.</p>
<div   role="dialog" id="modelProduct">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-edit" method="GET" role="form">
                @csrf @method('GET')
                <div class="panel panel-primary">
                    <div class="panel-heading" id="modeltitel">Thông tin đơn hàng <span id="id"></span></div>
                    <div>
                        <label for="">Tên khách hàng: </label>
                        <span id="name">{{$customer->name}}</span>
                    </div>
                    <div>
                        <label for="">Địa chỉ: </label>
                        <span id="adress">{{$customer->adress}}</span>
                    </div>
                    <div>
                        <label for="">Số điện thoại: </label>
                        <span id="phone">{{$customer->phone}}</span>
                    </div>
                    <div>
                        <?php
                        $date = getdate();
                        ?>
                        <label for="">Ngày đặt: </label>
                        <span id="created_at">{{$date['mday']}}/{{$date['mon']}}/{{$date['year']}}</span>
                    </div>
                    <div>
                        <label for="">Ghi chú: </label>
                        <span id="note"></span>
                    </div>
                    <div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Đơn giá</th>
                                    <th scope="col">Giảm(%)</th>
                                    <th scope="col">Note</th>
                                    <th scope="col">Tổng</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                @foreach($cart_done as $cart)
                                <tr>
                                    <th scope="col">{{$cart['name']}}</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">{{$cart['quantity']}}</th>
                                    <th scope="col">{{$cart['price']}}</th>
                                    <th scope="col">0</th>
                                    <th scope="col">ok</th>
                                    <th scope="col">{{$cart['quantity']*$cart['price']}}</th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- <div style="float: right">
                    <label for="">Thanh toán:</label>
                    <span id="total"></span>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btnaccept">Accept</button>
                    <button type="button" class="btn btn-primary" id="btneditsave" style="">Accept&Emport</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnclose">Close</button>
                </div> -->
            </form>
        </div>
    </div>
</div>
<script src="{{asset('public/fontend/js/jquery.js')}}"></script>
<script src="{{asset('public/fontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/fontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('public/fontend/js/price-range.js')}}"></script>
<script src="{{asset('public/fontend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('public/fontend/js/main.js')}}"></script>
@endsection