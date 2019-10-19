@extends('master') @section('content')
 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2 style="font-size: 25pt">Đặt hàng</h2>
					    <form action="{{route('dathang')}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div style="    font-size: 16pt; color: coral;">@if(Session::has('thongbao')){{Session::get('thongbao')}}@endif</div>
					    	<div >
						    	<span><label>Họ tên</label></span>
						    	<span><input type="text" name="name" class="textbox" ></span>
						    </div>
                            <div >
                                <span><label>Giới tính:</label></span>
                                <span><input type="radio" name="gender" value="Nam" checked class="textbox">Nam</span>
                                <span><input type="radio" name="gender" value="Nữ" class="textbox">Nữ</span>
                            </div>
						    <div>
						    	<span><label>E-mail</label></span>
						    	<span><input type="text" name="email" class="textbox"></span>
						    </div>
						    <div>
						     	<span><label>Địa chỉ</label></span>
						    	<span><input type="text" name="address" class="textbox"></span>
						    </div>
                            <div>
                                <span><label>Điện thoại</label></span>
                                <span><input type="text" name="phone" class="textbox"></span>
                            </div>
						    <div>
						    	<span><label>Ghi chú</label></span>
						    	<span><textarea name="notes"> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" value="Đặt hàng"  class="myButton"></span>
						  </div>
					    </form>
				  </div>
  				</div>
				<div class="col span_1_of_3">
                    <div class="boxqc nopadding noborder" >
                        <div class="tieudebox">
                            <p class="tieude2"> Đơn hàng của bạn</p>
                        </div>
                        <div class="sanphamall" >
                            <ul>
                                @if(Session::has('cart'))
                                @foreach($product_cart as $cart)
                                <li><a href="" title="haia">

                                        <img src="{{ Storage::url($cart['item']['image']) }}" width="160" height="140"><br /></a>

                                        <p style="color: #0b5017; margin-bottom: 5%;">Tên sản phẩm:{{$cart['item']['name']}}</p>
                                        <span>Đơn giá:{{number_format($cart['price'])}} đồng</span><br>
                                        <span>Số lượng:{{number_format($cart['qty'])}}</span>
                                </li>
                                    @endforeach
                                    @endif
                            </ul>
                            <p style="display: inline-block">Tổng tiền:</p>
                            <p style="font-size: 15pt; color: red;display: inline-block">@if(Session::has('cart')){{number_format($totalPrice)}}@else 0 @endif đồng</p>

                        </div>

				 </div>
			  </div>
         </div>
    </div>
 </div>


@endsection
