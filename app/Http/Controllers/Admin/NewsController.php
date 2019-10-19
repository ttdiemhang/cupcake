<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\NewsRequest;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index(){
        return view('backend.news.all_news');
    }
    public function add_news(){
        return view('backend.news.add_news');
    }
    public function all_news(){
        $data=[];
        $all_news=News::get();
        $data['all_news']=$all_news;
//        $manager_news=view('backend.news.all_news')->with('all_news',$all_news);
        return view('backend.news.all_news',$data);
    }
    public function save_news(Request $request){
        $data=[];
        if ($request->hasFile('image')) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $request->image = $request->file('image')->storeAs(
                'public/news', time() . '.' . $ext
            );
        }

        $data['title']=$request->title;
        $data['content'] = $request->noidung;
        $data['image'] =$request->image;
        $data['day'] = $request->day;

        News::insert($data);
        return redirect(route('admin-news-all'))->with('success', 'Thêm tin tức thành công.');
    }
    public function edit_news($id){
        $data=[];
        $edit_news=News::where('id',$id)->get();
        $data['edit_news']=$edit_news;
//        $manager_news=view('backend.news.edit_news')->with('edit_news',$edit_news);
        return view('backend.news.edit_news',$data);
    }
    public function update_news(Request $request, $id){
        $data=[];
        if ($request->hasFile('image')) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $request->image = $request->file('image')->storeAs(
                'public/image', time() . '.' . $ext
            );
        }
        $data['title']=$request->title;
        $data['content'] = $request->noidung;
        $data['image'] =$request->image;
        $data['day'] = $request->day;

        News::where('id',$id)->update($data);
        return redirect(route('admin-news-all'))->with('success', 'Cập nhật tin tức thành công.');
    }
    public function delete_news($id){
        News::where('id',$id)->delete();
        return redirect(route('admin-news-all'))->with('success', 'Xoá tin tức thành công.');
    }
}
