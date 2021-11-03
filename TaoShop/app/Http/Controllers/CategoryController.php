<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Category\storeRequest;
use App\Http\Requests\Category\updateRequest;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Category::orderBy('id','DESC')->Search()->paginate(5);
        return view('Layout_admin.category.index',compact('data'),[
            'titel'=>'trang loại sản phẩm'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Layout_admin.category.create',[
            'titel'=>'trang thêm loại sản phẩm'
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
           Category::create([
            "name"=>(string) $request->input('name'),
            "logo"=>(string) $request->input('logo')
           ]);
          }catch(\Exception $error){
            Session::flash("error",$error->getMessage());
            return back()->withErrors([
                'error' => 'Vui lòng nhập đủ thông tin cần thiết.'
            ]);
        }
    //    if(Product::create($request->all()))
    //    {
        return redirect()->route('category.index')->with('success','Thêm mới thành công');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        if($category->count()>0){
            return view('Layout_admin.category.edit',[
                'titel'=>'Trang sửa thông tin'
            ],compact('category')); 
        }else
        {
            return redirect()->route('category.index')->with('error','không tìm thấy');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(updateRequest $request,$id)
    {
        $category=Category::find($id);
        $category->update($request->only('name','logo'));
        return redirect()->route('category.index')->with('success','Cập nhật danh mục thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        if($category->products->count() > 0){
              return redirect()->route('category.index')->with('error','Không thể xóa danh mục đã liên kết');
        }
        else{
            $category->delete();
            return redirect()->route('category.index')->with('success','Đã xóa danh mục');
        }
    }
}
