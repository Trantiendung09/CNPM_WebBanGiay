@extends('Layout_admin.Main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        @include('Layout_admin.alert')
            <header class="panel-heading">
               Thêm mới loại sản phẩm
                <span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;"></a>
                    <a class="fa fa-cog" href="javascript:;"></a>
                    <a class="fa fa-times" href="javascript:;"></a>
                 </span>
            </header>
            <div class="panel-body">
                <div class="form">
                    <form class="cmxform form-horizontal " id="commentForm" method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
                       @csrf
                        <div class="col-lg-9">
                            <div class="form-group ">
                                <label for="cname" class="control-label col-lg-3">Tên loại</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" id="cname" name="name" minlength="2" type="text" required="">
                                </div>
                            </div>
                        </div>
                       <div class="col-lg-3">
                        <div class="form-group ">
                            <label for="cemail" class="control-label col-lg-3">Logo</label>
                            <div class="col-lg-6">
                                <input class="form-control " id="cemail" type="file" name="file_image" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 ">
                                <button name="save" class="btn btn-primary" type="submit">Save</button>
                                <button name="cancel" class="btn btn-default" type="button">Cancel</button>
                            </div>
                        </div>
                       </div>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection