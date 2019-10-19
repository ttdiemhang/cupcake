<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/style_loai.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <script>
        $(".move-top text-right").click(function () {
            return $("body,html").animate({scrollTop:0},400),!1});
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()});
    </script>

    <title>Loại sản phẩm</title>
</head>
<body>
<div class="container">
<div class="wrap">
    <div class="header">
        <div class="logo">
            <a href="index.html"><img src="../image/logo.png" title="logo" /></a>
        </div>
    </div>
    <div class="top-menu">
        <ul>
            <li class="current"><a href="index.html">Tài Khoản</a></li>
            <li class="submemu"><a href="about.html">Đăng ký thành viên</a></li>
            <li class="submemu"><a href="events.html">Đăng Xuất</a></li>

        </ul>
    </div>
    <div class="clear">

    </div>

<!-- {{--    --------------------top bar--------------------------------------------------}} -->

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            @foreach($slide as $sl)
                <div class="item active">

                    <img src="{{ Storage::url($sl->image) }}" alt="Los Angeles">
                </div>

                <div class="item">
                    <img src="{{ Storage::url($sl->image) }}" alt="Chicago">
                </div>


            @endforeach
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <br/>

</div>
@include('frontend.layouts.nav')

<div class="main">
    <div class="content">
        <h1 style="margin-left: 3%; color: #e75a39;">{{$loai_sp->name}}</h1>
        <div class="section group">

            <div class="cont-desc span_1_of_2">

                    <div class="header_bottom_right" style="width: 100%">

                        <div class="content_top">
                            <div class="heading">
                                <h3>New Products</h3>
                            </div>
                            <div class="see">

                                <p style="font-style: italic; font-family: sans-serif; font-size: 10pt;color: lightgoldenrodyellow;"> Tìm thấy {{count($sp_theoloai)}} sản phẩm </p>

                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="section_group">
                            @foreach($sp_theoloai as $sp)
                            <div class="grid_1_of_4 images_1_of_4">
                                @if($sp->promotion_price!=0)
                                    <div class="text">Sale</div>
                                @endif
                                <a href="{{route('chitietsanpham',$sp->id)}}"><img src="{{ Storage::url($sp->image) }}" alt="a" /></a>
                                <h2>{{$sp->name}} </h2>
                                <div class="price-details">
                                    <div class="price-number">
                                        @if($sp->promotion_price==0)
                                            <p><span class="rupees" style="color: crimson;font-size: 14pt;">{{number_format($sp->unit_price)}} đồng</span></p>
                                        @else
                                        <p><span class="rupees" style="text-decoration: line-through;">{{number_format($sp->unit_price)}} đồng</span></p>
                                        <p><span class="rupees" style="color: crimson;font-size: 14pt;">{{number_format($sp->promotion_price)}} đồng</span></p>
                                            @endif

                                    </div>
                                    <div class="add-cart">
                                        <h4><a href="preview.html">Add to Cart</a></h4>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                                @endforeach


                        </div>
                    </div>
                <div class="header_bottom_right" style="width: 100%">

                    <div class="content_top">
                        <div class="heading">
                            <h3>Sản Phẩm Khác</h3>
                        </div>
                        <div class="see">

                           <p style="font-style: italic; font-family: sans-serif; font-size: 10pt; color: lightgoldenrodyellow;"> Tìm thấy {{count($sp_khac)}} sản phẩm </p>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="section_group">
                        @foreach($sp_khac as $sp_k)
                            <div class="grid_1_of_4 images_1_of_4">
                                @if($sp_k->promotion_price!=0)
                                    <div class="text">Sale</div>
                                @endif
                                <a href={{route('chitietsanpham',$sp_k->id)}}><img src="{{ Storage::url($sp_k->image) }}" alt="" /></a>
                                <h2>{{$sp_k->name}} </h2>
                                <div class="price-details">
                                    <div class="price-number">
                                        @if($sp_k->promotion_price==0)
                                            <p><span class="rupees" style="color: crimson;font-size: 12pt;">{{number_format($sp_k->unit_price)}} đồng</span></p>
                                        @else
                                            <p><span class="rupees" style="text-decoration: line-through;">{{number_format($sp_k->unit_price)}} đồng</span></p>
                                            <p><span class="rupees" style="color: crimson;font-size: 12pt;">{{number_format($sp_k->promotion_price)}} đồng</span></p>
                                        @endif

                                    </div>
                                    <div class="add-cart">
                                        <h4><a href="preview.html">Add to Cart</a></h4>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        @endforeach
                            <p>{{$sp_khac->links()}}</p>

                    </div>

                </div>

            </div>

             <div class="rightsidebar span_3_of_1">
                        <h2>Loại Bánh</h2>
                        <ul class="side-w3ls" style="list-style: none;">
                            @foreach($loai as $l)
                            <li><a href="{{route('loaisanpham',$l->id)}}">{{$l->name}}</a></li>
                            @endforeach
                        </ul>
                        <div class="subscribe">
                            <h2>Newsletters Signup</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.......</p>
                            <div class="signup">
                                <form>
                                    <input type="text" value="E-mail address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail address';">
                                    <input type="submit" value="Sign up">
                                </form>
                            </div>
                        </div>
             </div>
         </div>
      </div>
</div>
    <footer class="footer-content">
        <div class="layer footer">
            <div class="container-fluid">
                <div class="row footer-top-inner-w3ls">
                    <div class="col-lg-4 col-md-6 footer-top mt-md-0 mt-sm-5">
                        <h2 style="    margin: 0;
    letter-spacing: 1px;
    font-weight: 400;
    font-family: 'Oswald', sans-serif;">
                            <a href="{{route('trang-chu')}}"><span class="fa fa-align-center" aria-hidden="true"></span>CupCake</a>
                        </h2>
                        <p class="my-3">ĐĂNG KÝ NHẬN TIN</p>
                        <p class="my-3">
                            Mỗi tháng chúng tôi đều có những đợt giảm giá dịch vụ và sản phẩm nhằm tri ân khách hàng. Để có thể cập nhật kịp thời những đợt giảm giá này, vui lòng nhập địa chỉ email của bạn vào ô dưới đây.
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-md-0 mt-5">
                        <div class="footer-w3pvt">
                            <h3 class="mb-3 w3pvt_title">Giờ mở cửa</h3>
                            <hr>
                            <ul class="list-info-w3pvt last-w3ls-contact mt-lg-4">
                                <li>
                                    <p > Thứ Hai - Thứ Sáu 08.00 am - 10.00 pm</p>

                                </li>
                                <li class="my-2">
                                    <p>Thứ Bảy 08.00 am - 10.00 pm</p>

                                </li>
                                <li class="my-2">
                                    <p>Chủ Nhật 08.00 am - 10.00 pm</p>

                                </li>


                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mt-lg-0 mt-5">
                        <div class="footer-w3pvt">
                            <h3 class="mb-3 w3pvt_title">Liên hệ</h3>
                            <hr>
                            <div class="last-w3ls-contact">
                                <p>
                                    <a href="mailto:diemhang.sh@gmail.com" class="fa fa-envelope">     diemhang.sh@gmail.com</a>
                                </p>
                            </div>
                            <div class="last-w3ls-contact my-2">

                            </div>
                            <div class="last-w3ls-contact">
                                <i class="fa fa-home" style="color: white;line-height: 24px;">   Số 09 Trần Thái Tông, P. Dịch Vọng, Q. Cầu Giấy, TP. Hà Nội</i>

                                <i class="fa fa-mobile" style="color: white;   margin-top: 3%;">   0123456789</i>
                            </div>

                        </div>
                    </div>

                </div>

                <p class="copy-right-grids text-li text-center my-sm-4 my-4">© 2019 CupCake. All Rights Reserved | Design by
                    <a href="http://w3layouts.com/"> DiemHang </a>
                </p>
                <div class="w3ls-footer text-center mt-4">
                    <ul class="list-unstyled w3ls-icons">
                        <li>
                            <a href="#">
                                <span class="fa fa-facebook-f"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa fa-twitter"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa fa-dribbble"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa fa-vk"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="move-top text-right" data-toggle="tooltip" data-placement="left" title="Quay về đầu trang"><a href="" class="move-top"> <span class="fa fa-angle-up  mb-3" aria-hidden="true"></span></a></div>
            </div>
            <!-- //footer bottom -->
        </div>
    </footer>

</div>

</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
<script type="text/javascript" src="../js/move-top.js"></script>
<script type="text/javascript" src="../js/easing.js"></script>
<script type="text/javascript" src="../js/startstop-slider.js"></script>

</html>
