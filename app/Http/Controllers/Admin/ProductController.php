<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProductRequest;
use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function add_product(){
        $category_product=ProductType::orderby('id','desc')->get();
        return view('backend.products.add_product')->with('category_product',$category_product);
    }
    public function all_product(){
        $data=[];
        $all_product=Product::orderby('id','desc')->paginate(5);
        $data['all_product']=$all_product;
//        $manager_product=view('backend.products.all_product')->with('all_product',$all_product);
        return view('backend.products.all_product',$data);
    }
    public function save_product(Request $request){
        $data=[];
        if ($request->hasFile('image')) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $request->image = $request->file('image')->storeAs(
                'public/image', time() . '.' . $ext
            );
        }
        $data['name']=$request->name;
        $data['description']=$request->description;
        $data['image']=$request->image;
        $data['unit_price']=$request->unit_price;
        $data['promotion_price']=$request->promotion_price;
        $data['unit']=$request->unit;
        $data['id_type']=$request->category;
        $data['new']=$request->new;

        Product::insert($data);
        return redirect(route('admin-product-all'))->with('success', 'Thêm sản phẩm thành công.');

    }
    public function edit_product($id){
        $category_product=ProductType::orderby('id','desc')->get();
        $edit_product=Product::where('id',$id)->get();
        $manager_product=view('backend.products.edit_product')
            ->with('edit_product',$edit_product)
            ->with('category_product',$category_product);
        return view('admin_layout')->with('backend.products.edit_product',$manager_product);
    }
    public function update_product(Request $request, $id){
        $data=array();
        if ($request->hasFile('image')) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $request->image = $request->file('image')->storeAs(
                'public/image', time() . '.' . $ext
            );
        }
        $data['name']=$request->name;
        $data['description']=$request->description;
        $data['image']=$request->image;
        $data['unit_price']=$request->unit_price;
        $data['promotion_price']=$request->promotion_price;
        $data['unit']=$request->unit;
        $data['id_type']=$request->category;
        $data['new']=$request->new;

        Product::where('id',$id)->where('id',$id)->update($data);
        return redirect(route('admin-product-all'))->with('success', 'Cập nhật sản phẩm thành công.');
    }
    public function delete_product($id){
        Product::where('id',$id)->delete();
        return redirect(route('admin-product-all'))->with('success', 'Xoá sản phẩm thành công.');

    }
}
