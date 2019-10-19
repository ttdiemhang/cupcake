<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CategoryRequest;
use App\ProductType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CategoryProduct extends Controller
{
    public function add_category(){
        return view('backend.categories.add_category');
    }
    public function all_category(){
        $data=[];
        $all_category=ProductType::get();
        $data['all_category'] =  $all_category;
        return view('backend.categories.all_category',$data);
    }
    public function save_category(CategoryRequest $request){
        $data=array();
        $data['name']=$request->category_name;

         ProductType::insert($data);
        return redirect(route('admin-category-all'))->with('success', 'Thêm danh mục sản phẩm thành công.');

    }
    public function edit_category($id){
        $data=[];
        $edit_category=ProductType::where('id',$id)->get();
        $data['edit_category']=$edit_category;
        return view('backend.categories.edit_category',$data);
    }
    public function update_category(CategoryRequest $request, $id){
        $data=array();
        $data['name']=$request->category_name;


        ProductType::where('id',$id)->update($data);
        return redirect(route('admin-category-all'))->with('success', 'Cập nhật danh mục sản phẩm thành công.');
    }
    public function delete_category($id){
        ProductType::where('id',$id)->delete();
        return redirect(route('admin-category-all'))->with('success', 'Xoá danh mục sản phẩm thành công.');

    }

}
