<?php

namespace App\Http\Controllers\Admin;

use App\Bill;
use App\BillDetail;
use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BillController extends Controller
{
    public function all_bill()
    {
        $data=[];
        $all_bill = BillDetail::get();
        $data['all_bill'] =   $all_bill;
        return view('backend.bills.all_bill',$data);
    }

    public function delete_bill($id)
    {
        BillDetail::where('id', $id)->delete();
        return redirect(route('admin-bill-all'))->with('success', 'Xoá đơn hàng thành công.');

    }
}
