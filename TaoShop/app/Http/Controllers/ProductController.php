<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\product\storeRequest;
use App\Models\Photo;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Product::orderBy('id','DESC')->Search()->paginate(10);
        return view('Layout_admin.product.index',compact('data'),[
            'titel'=>'trang danh sách sản phẩm'
        ]);   
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat=Category::orderBy('id','ASC')->select('id','name')->get();
        $brand=Brand::orderBy('id','ASC')->select('id','name')->get();
        $photo=Photo::orderBy('id','DESC')->select('id')->get();
       return view('Layout_admin.product.create',[
           'titel'=>'trang tạo mới sản phẩm'
       ],compact('cat','brand','photo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeRequest $request)
    {
        // try{
        //     // $this->validate($request,[
        //     //     'name'=>'required',
        //     //     'logo' =>'required'
        //     // ]);
        //    Category::create([
        //     "name"=>(string) $request->input('name'),
        //     "logo"=>(string) $request->input('logo')
        //    ]);
        //   }catch(\Exception $error){
        //     Session::flash("error",$error->getMessage());
        //     return back()->withErrors([
        //         'error' => 'Vui lòng nhập đủ thông tin cần thiết.'
        //     ]);
        // }
       if(Product::create($request->all()))
       {
        return redirect()->route('product.index')->with('success','Thêm mới thành công');   
       }
       else
       return redirect()->back()->with('error','Thêm mới thất bại');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $data=Product::find($id);
        $cat=Category::orderBy('id','ASC')->where('id','!=',$data->category_id)->select('id','name')->get();
        $brand=Brand::orderBy('id','ASC')->where('id','!=',$data->brand_id)->select('id','name')->get();
        $photo=Photo::orderBy('id','DESC')->select('id')->get();
        $category_name=$data->categoryname()->select('id','name')->get();
        $brand_name=$data->brandname()->select('id','name')->get();
        $catname=$category_name[0]->name;
        $brandname=$brand_name[0]->name;
        if($data->count()>0){
            return view('Layout_admin.product.edit',[
                'titel'=>'Trang sửa thông tin'
            ],compact('data','cat','brand','photo','catname','brandname')); 
        }else
        {
            return redirect()->route('product.index')->with('error','không tìm thấy');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(storeRequest $request,$id)
    {
        $product=Product::find($id);
        $product->update($request->all());
        return redirect()->route('product.index')->with('success','Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // trước khi xóa cần kiểm tra liên kết khóa ngoại 
       // bảng chi tiết hóa đơn và bảng giỏ hàng.
       $product=Product::find($id);
       if($product->orderdetail->count()>0||$product->cart->count()>0){
           return redirect()->route('product.index')->with('error','không thể xóa sản phẩm trong hóa đơn');
       }
       else{
           $product->delete();
           return redirect()->route('product.index')->with('success','xóa sản phẩm thành công');
       }
    }
}
