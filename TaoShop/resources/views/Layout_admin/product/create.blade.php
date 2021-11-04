@extends('Layout_admin.Main')
@section('header')
    <script src="{{asset('/public/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        @include('Layout_admin.alert')
            <header class="panel-heading">
               Thêm mới sản phẩm
            </header>
            <div class="panel-body">
                <div class="form">
                    <form class="cmxform form-horizontal " id="commentForm" method="POST" action="{{route('product.store')}}">
                       @csrf
                     <div class="row">
                         <div class="col-md-9">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Tên</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="cname" name="name" minlength="2" placeholder="Input name" type="text" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Mô tả</label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" id="content"  placeholder="Input desciption" name="note"></textarea>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Image List</label>
                                    <div class="col-lg-6">
                                        <select class="form-control" name="photo_id">
                                            <option value="0">---select---</option>
                                            @foreach ($photo as $item)
                                                <option value="{{$item->id}}">{{$item->id}}</option>
                                            @endforeach
                                          </select>                               
                                     </div>
                                </div>

                         </div>
                         <div class="col-md-3">
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-3">Loại</label>
                                <div class="col-lg-6">
                                    <select class="form-control" name="category_id">
                                        <option value="0">---select---</option>
                                        @foreach ($cat as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                      </select>                               
                                 </div>
                            </div>
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-3">Thương hiệu</label>
                                <div class="col-lg-6">
                                    <select class="form-control" name="brand_id">
                                        <option value="0">---select---</option>
                                        @foreach ($brand as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-3">Size</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" placeholder="input size" name="size" minlength="2" type="text" required="">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="cname" class="control-label col-lg-3">Màu</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" placeholder="input color" name="color" minlength="2" type="text" required="">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="cname" class="control-label col-lg-3">Số lượng</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" placeholder="input quantity"  name="quantity" minlength="2" type="text" required="">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="cname" class="control-label col-lg-3">Đơn giá</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" placeholder="input price"  name="price" minlength="2" type="text" required="">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="cname" class="control-label col-lg-3">Giảm</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" placeholder="input discount"  name="discount" minlength="2" type="text" required="">
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="col-lg-offset-3 ">
                                    <button name="save" class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                         </div>
                     </div>
                

                    </form>
                </div>
            </div>
    </div>
</div>
@endsection
@section('footer')
    <script>
        CKEDITOR.replace('content')
    </script>
@endsection