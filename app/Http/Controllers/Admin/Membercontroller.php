<?php

namespace App\Http\Controllers\Admin;

use App\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Membercontroller extends Controller
{
    public function all_member()
    {
        $data=[];
        $all_member = Member::get();
        $data['all_member'] =  $all_member;
        return view('backend.member.all_member',$data);
    }
    public function edit_member($id){
        $data=[];
        $edit_member=Member::where('id',$id)->get();
        $data['edit_member']=$edit_member;
        return view('backend.member.edit_member',$data);
    }
    public function update_member(Request $request, $id){
        $data=[];
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['gender']=$request->gender;
        $data['address']=$request->address;
        $data['phone_number']=$request->phone_number;


        Member::where('id',$id)->update($data);
        return redirect(route('admin-member-all'))->with('success', 'Cập nhật thành viên thành công.');
    }

    public function delete_member($id)
    {
        Member::where('id', $id)->delete();
        return redirect(route('admin-member-all'))->with('success', 'Xoá thành viên thành công.');

    }
}
