@extends('Layout_admin.Main')
@section('header')
    <script src="{{asset('/public/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        @include('Layout_admin.alert')
            <header class="panel-heading">
               Sửa thông tin mới sản phẩm
            </header>
            <div class="panel-body">
                <div class="form">
                    <form class="cmxform form-horizontal " id="commentForm" method="POST" action="{{route('product.update',$data->id)}}">
                       @csrf @method('PUT')
                     <div class="row">
                         <div class="col-md-9">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Tên</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="cname" name="name" minlength="2" value="{{$data->name}}" type="text" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Mô tả</label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" id="content" name="note">{{$data->note}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Image List</label>
                                    <div class="col-lg-6">
                                        <select class="form-control" name="photo_id">
                                            <option value="{{$data->photo_id}}">{{$data->photo_id}}</option>
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
                                        <option value="{{$data->category_id}}">{{$catname}}</option>
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
                                        <option value="{{$data->brand_id}}">{{$brandname}}</option>
                                        @foreach ($brand as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-3">Size</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" value="{{$data->size}}" name="size"  type="number" required="">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="cname" class="control-label col-lg-3">Màu</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" value="{{$data->color}}" name="color"  type="text" required="">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="cname" class="control-label col-lg-3">Số lượng</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" value="{{$data->quantity}}"  name="quantity"  type="number" required="">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="cname" class="control-label col-lg-3">Đơn giá</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" value="{{$data->price}}" name="price"  type="number" required="">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="cname" class="control-label col-lg-3">Giảm</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" value="{{$data->discount}}"  name="discount"  type="number" required="">
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