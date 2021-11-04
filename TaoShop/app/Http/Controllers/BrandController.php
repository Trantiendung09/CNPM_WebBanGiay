<?php

namespace App\Http\Controllers;

use App\Http\Requests\brand\storeRequest;
use App\Http\Requests\brand\updateRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Brand::orderBy('id','DESC')->Search()->paginate(5);
        return view('Layout_admin.brand.index',compact('data'),[
            'titel'=>'trang thương hiệu sản phẩm'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Layout_admin.brand.create',[
            'titel'=>'trang thêm thương hiệu'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeRequest $request)
    {
        try{
            if($request->has('file_image')){
                $file=$request->file_image;
                 $ext=$file->extension(); // lấy đuôi của ảnh 
                 $file_name=time().'-logo.'.$ext;
                $file->move(public_path('uploads',$file_name));
            }
            $request->merge(['logo'=>$file_name]);
           Brand::create([
            "name"=>(string) $request->input('name'),
            "logo"=>(string) $request->input('logo')
           ]);
          }catch(\Exception $error){
            Session::flash("error",$error->getMessage());
            return back()->withErrors([
                'error' => 'Vui lòng nhập đủ thông tin cần thiết.'
            ]);
        }
        return redirect()->route('brand.index')->with('success','Thêm mới thành công');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand=Brand::find($id);
        if($brand->count()>0){
            return view('Layout_admin.brand.edit',[
                'titel'=>'Trang sửa thông tin'
            ],compact('brand')); 
        }else
        {
            return redirect()->route('brand.index')->with('error','không tìm thấy');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(updateRequest $request, $id)
    {
        $brand=Brand::find($id);
        $brand->update($request->only('name','logo'));
        return redirect()->route('brand.index')->with('success','Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand=Brand::find($id);
        if($brand->products->count() > 0){
              return redirect()->route('brand.index')->with('error','Không thể xóa danh mục đã liên kết');
        }
        else{
            $brand->delete();
            return redirect()->route('brand.index')->with('success','Đã xóa danh mục');
        }
    }
}
