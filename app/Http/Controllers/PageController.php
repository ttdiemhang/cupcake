<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillDetail;
use App\Cart;
use App\Customer;
use App\Http\Requests\RegisterRequest;
use App\Member;
use App\News;
use App\Product;
use App\ProductType;
use App\Slide;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex()

    {

        $slide = Slide::all();
//        return view('frontend.trangchu',['slide'=>$slide]);
        $new_product = Product::where('new', 1)->orderby('id','desc')->paginate(6);
        $loai_sp = ProductType::all();
        $news = News::all();
        $sanpham_khuyenmai = Product::where('promotion_price', '<>', 0)->paginate(6);

        return view('frontend.trangchu', compact('slide', 'new_product', 'sanpham_khuyenmai', 'loai_sp','news'));
    }

    public function getLoaiSp($type)
    {
        $slide = Slide::all();
        $sp_theoloai = Product::where('id_type', $type)->get();
        $sp_khac = Product::where('id_type', '<>', $type)->paginate(6);
        $loai = ProductType::all();
        $loai_sp = ProductType::where('id', $type)->first();

        return view('frontend.loai_sanpham', compact('slide', 'sp_theoloai', 'sp_khac', 'loai', 'loai_sp'));
    }

    public function getChiTietSp(Request $req)
    {

        $slide = Slide::all();
        $loai = ProductType::all();
        $sanpham = Product::where('id', $req->id)->first();
        $sp_tuongtu = Product::where('id_type', $sanpham->id_type)->paginate(6);
        return view('frontend.chitiet_sanpham', compact('slide', 'loai', 'sanpham', 'sp_tuongtu'));
    }

    public function getLienHe()
    {
        $slide = Slide::all();
        return view('frontend.lienhe', compact('slide'));
    }

    public function getNews()
    {
        $slide = Slide::all();
        $news = News::all();
        return view('frontend.news', compact('slide','news'));
    }

    public function getAddtoCart(Request $req, $id)
    {
        $product = Product::find($id);
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart', $cart);
        return redirect()->back();

    }

    public function getDelItemCart($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart', $cart);
        return redirect()->back();
    }

    public function getCheckout()
    {

        $slide = Slide::all();
        return view('frontend.dathang', compact('slide'));
    }

    public function postCheckout(Request $req)
    {

        $cart = Session::get('cart');

        $customer = new Customer();
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill();
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->note = $req->notes;
        $bill->save();
        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail();
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = $value['price'] / $value['qty'];
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao', 'Đặt hàng thành công');
    }

    public function getSearch(Request $req)
    {
        $slide = Slide::all();
        $news=News::all();

        $product = Product::where('name', 'like', '%' . $req->key . '%')
            ->orWhere('unit_price', $req->key)->get();
        return view('frontend.search', compact('slide','news', 'product'));
    }

    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function profile()
    {
        $customer = Auth::user();

        $userInfo = [
            "id" => $customer->id,
            "name" => $customer->name,
            "email" => $customer->email,
            'phone_number' => $customer->phone_number,
            'gender' =>$customer->gender,
            'address' =>$customer->address,
        ];

        return response()->json($userInfo);
    }
}
