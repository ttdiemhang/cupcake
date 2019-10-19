<div class="menu">

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{route('trang-chu')}}">Trang chủ<span class="sr-only">(current)</span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Loại bánh <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @foreach($loai_sp as $loai)
                                <li><a href="{{route('loaisanpham',$loai->id)}}">{{$loai->name}}</a></li>
                            @endforeach

                        </ul>
                    </li>
                    <li><a href="{{route('dathang')}}">Giỏ hàng</a></li>
                    <li><a href="{{route('news')}}">Tin tức</a></li>
                    <li><a href="{{route('lienhe')}}">Liên hệ</a></li>
                </ul>
                <form class="navbar-form navbar-left" role="search" method="get" action="{{route('search')}}">
                    <div class="form-group">
                        <input type="text" name="key" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Tìm kiếm</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    @if(Session::has('cart'))
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-shopping-cart">
                    </span>Giỏ hàng (@if(Session::has('cart')){{Session('cart')->totalQty}}) @else Trống @endif  <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-cart" role="menu">

                                @foreach($product_cart as $product)
                                    <li><div class="item">
                                            <div class="img_cart">
                                            <img src="{{Storage::url($product['item']['image'])}}" class="img img-responsive" width="120px" alt="" />
                                            </div>
                                            <div class="item-info">
                                                <p>{{$product['item']['name']}}</p>
                                                <p>{{$product['qty']}} * <span>{{number_format($product['item']['unit_price'])}}</span></p>
                                                <a class="btn btn-xs btn-danger pull-right" href="{{route('xoagiohang',$product['item']['id'])}}">x</a>

                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </li>

                                @endforeach
                                <div class="item-info">
                                    <span>Tổng tiền:</span>
                                    <div style="color: red;float: right;">{{number_format(Session('cart')->totalPrice)}} đồng</div>
                                </div>

                                <li><a class="text-center" href="{{route('dathang')}}">Xem giỏ hàng</a></li>


                            </ul>
                        </li>
                    @endif
                </ul>
                <div class="top-menu">
                    <ul>

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile') }}"
                                       onclick="event.preventDefault(); showMember()">
                                        {{ __('Thông tin') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Đăng xuất') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    </ul>
                        @endguest
                            <div class="modal" id="modal-profile">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Thông tin tài khoản</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Fullname</label>
                                                <p class="user-fullname"></p>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <p class="user-email"></p>
                                            </div>
                                            <div class="form-group">
                                                <label>Giới tính</label>
                                                <p class="user-gender"></p>
                                            </div>
                                            <div class="form-group">
                                                <label>Địa chỉ</label>
                                                <p class="user-address"></p>
                                            </div>
                                            <div class="form-group">
                                                <label>SĐT</label>
                                                <p class="user-phone"></p>
                                            </div>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                </div>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</div>
