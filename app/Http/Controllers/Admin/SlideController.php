<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\NewsRequest;
use App\News;
use App\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlideController extends Controller
{
    public function index(){
        return view('backend.slide.all_slide');
    }
    public function add_slide(){
        return view('backend.slide.add_slide');
    }
    public function all_slide(){
        $data=[];
        $all_slide=Slide::get();
        $data['all_slide']=$all_slide;
        return view('backend.slide.all_slide',$data);
    }
    public function save_slide(Request $request){
        $data=[];
        if ($request->hasFile('image')) {

            $ext = $request->file('image')->getClientOriginalExtension();
            $request->image = $request->file('image')->storeAs(
                'public/image', time() . '.' . $ext
            );
        }
        $data['image']=$request->image;


        Slide::insert($data);
        return redirect(route('admin-slide-all'))->with('success', 'Thêm slide thành công.');
    }
    public function edit_slide($id){
        $data=[];
        $edit_slide=Slide::where('id',$id)->get();
        $data['edit_slide']=$edit_slide;

        return view('backend.slide.edit_slide',$data);
    }
    public function update_slide(Request $request, $id){
        $data=[];
        if ($request->hasFile('image')) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $request->image = $request->file('image')->storeAs(
                'public/image', time() . '.' . $ext
            );
        }
        $data['image']=$request->image;

        Slide::where('id',$id)->update($data);
        return redirect(route('admin-slide-all'))->with('success', 'Cập nhật slide thành công.');
    }
    public function delete_slide($id){
        Slide::where('id',$id)->delete();
        return redirect(route('admin-slide-all'))->with('success', 'Xoá slide thành công.');

    }
}
