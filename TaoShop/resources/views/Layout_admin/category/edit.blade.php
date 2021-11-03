@extends('Layout_admin.Main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        @include('Layout_admin.alert')
            <header class="panel-heading">
               Sửa thông tin loại sản phẩm
                <span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;"></a>
                    <a class="fa fa-cog" href="javascript:;"></a>
                    <a class="fa fa-times" href="javascript:;"></a>
                 </span>
            </header>
            <div class="panel-body">
                <div class="form">
                    <form class="cmxform form-horizontal " id="commentForm" method="POST" action="{{route('category.update',$category->id)}}" enctype="multipart/form-data">
                       @csrf @method('PUT')
                        <div class="col-lg-9">
                            <div class="form-group ">
                                <label for="cname" class="control-label col-lg-3">Tên loại</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" id="cname" name="name" minlength="2" type="text" required="" value="{{$category->name}}">                     
                                    @error('name')
                                        <small class="help-block">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                       <div class="col-lg-3">
                        <div class="form-group ">
                            <label for="cemail" class="control-label col-lg-3">LOGO</label>
                            <div class="col-lg-6">
                                <input class="form-control " id="cemail" type="file" name="file_image" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 ">
                                <button name="edit" class="btn btn-primary" type="submit">EDIT</button>
                                {{-- <form action="{{route('category.index')}}">
                                    @csrf
                                <button name="cancel" class="btn btn-default" type="submit">Cancel</button>
                                </form> --}}
                            </div>
                        </div>
                       </div>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection