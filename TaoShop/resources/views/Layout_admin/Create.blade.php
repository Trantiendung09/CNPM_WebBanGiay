@extends('Layout_admin.Main')
@section('header')
    <script src="{{asset('/public/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Danh Mục Mới
                {{-- @php
                    @if(Session::get('sussces'))
                        echo '<alert>'.Session::get('sussces').'</alert>';
                    @endif
                     @if(Session::get('error'))
                        echo '<alert>'.Session::get('error').'</alert>';
                 @endif        
                @endphp --}}
                <span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;"></a>
                    <a class="fa fa-cog" href="javascript:;"></a>
                    <a class="fa fa-times" href="javascript:;"></a>
                 </span>
            </header>
            <div class="panel-body">
                <div class=" form">
                    <form class="cmxform form-horizontal " id="commentForm" method="POST"  novalidate="novalidate">
                        @csrf
                        <div class="form-group ">
                            <label for="cname" class="control-label col-lg-3">Name (required)</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="name" name="name" minlength="2" type="text" required="">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-3">Danh mục cha</label>
                            <div class="col-lg-6">
                                <select class="form-control" name="parent_id">
                                    <option value="0">Danh mục cha</option>
                                    @foreach ($menus as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="cname" class="control-label col-lg-3">Mô tả</label>
                            <div class="col-lg-6">
                                <input class=" form-control"  name="description" minlength="2" type="text" required="">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-3">Mô tả chi tiết</label>
                            <div class="col-lg-6">
                               <textarea class="form-control" id="content" name="content"></textarea>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="cname" class="control-label col-lg-3">Kích hoạt</label>
                            <div class="col-lg-6">
                                <input class=" form-control-radio" id="active" value="1" name="active" minlength="2" type="radio" required="">
                                <label>có</label>
                            </div>
                            <div class="col-lg-6">
                                <input class=" form-control-radio" id="no_active" value="0" name="active" minlength="2" type="radio" required="">
                                <label>không</label>
                            </div>
                        </div>  
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button class="btn btn-primary" type="submit">Save</button>
                                <button class="btn btn-default" type="button">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
</div>
@endsection


@section('footer')
    <script>
        CKEDITOR.replace('content')
    </script>
@endsection