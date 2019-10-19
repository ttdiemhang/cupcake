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

    <title>Chi tiết sản phẩm</title>
</head>
<body>
<div class="container">
    <div class="wrap">
        <div class="header">
            <div class="logo">
                <a href="index.html"><img src="../image/logo.png" title="logo" /></a>
            </div>
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
{{--                    <div class="item">--}}
{{--                        <img src="../image/slide/{{$sl->image}}" alt="ab">--}}
{{--                    </div>--}}

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
        <h1 style="margin-left: 3%; color: #e75a39;">{{$sanpham->name}}</h1>
        <div class="section group">
            <div class="cont-desc span_1_of_2">
                <div class="product-details">
                    <div class="grid images_3_of_2">
                        <div id="container">
                            <div id="products_example">
                                <div id="products">
                                    <div class="slides_container">
                                        <a href="#" target="_blank"><img src="{{ Storage::url($sanpham->image) }}" alt=" " /></a>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="desc span_3_of_2">
                        <h2 >{{$sanpham->name}}</h2>
                        <div class="price">
                            @if($sanpham->promotion_price==0)
                                <p><span class="rupees" style="color: crimson;font-size: 26pt;">{{number_format($sanpham->unit_price)}} đồng</span></p>
                            @else
                                <p><span class="rupees" style="text-decoration: line-through;">{{number_format($sanpham->unit_price)}} đồng</span></p>
                                <p><span class="rupees" style="color: crimson;font-size: 26pt;">{{number_format($sanpham->promotion_price)}} đồng</span></p>
                            @endif
                        </div>
                        <div class="available">

                            <ul>
                                <li>Số lượng:
                                    <select>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </li>
                            </ul>
                        </div>

                        <div class="share-desc">

                            <div class="button"><span><a href="{{route('themgiohang',$sanpham->id)}}">Thêm giỏ hàng</a></span></div>
                            <div class="clear"></div>
                        </div>
                        <div class="wish-list">
                            <ul>
                                <li class="wish"><a href="#">Add to Wishlist</a></li>
                                <li class="compare"><a href="#">Add to Compare</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="product_desc">
                        <div id="horizontalTab">
                            <ul class="resp-tabs-list">
                                <li>Mô tả</li>
                                <div class="clear"></div>
                            </ul>
                            <div class="resp-tabs-container">
                                <div class="product-desc">
                                <p>{{$sanpham->description}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="header_bottom_right" style="width: 100%">

                            <div class="content_top">
                                <div class="heading">
                                    <h3>Sản Phẩm Tương Tự</h3>
                                </div>

                                <div class="clear"></div>
                            </div>
                            <div class="section_group">
                                @foreach($sp_tuongtu as $sptt)
                                <div class="grid_1_of_4 images_1_of_4">
                                    @if($sptt->promotion_price!=0)
                                        <div class="text">Sale</div>
                                    @endif
                                    <a href="{{route('chitietsanpham',$sptt->id)}}"><img src="{{ Storage::url($sptt->image) }}" alt="" /></a>
                                    <h2>{{$sptt->name}} </h2>
                                    <div class="price-details">
                                        <div class="price-number">
                                            @if($sptt->promotion_price==0)
                                                <p><span class="rupees" style="color: crimson;font-size: 14pt;">{{number_format($sptt->unit_price)}} đồng</span></p>
                                            @else
                                                <p><span class="rupees" style="text-decoration: line-through;">{{number_format($sptt->unit_price)}} đồng</span></p>
                                                <p><span class="rupees" style="color: crimson;font-size: 14pt;">{{number_format($sptt->promotion_price)}} đồng</span></p>
                                            @endif
                                        </div>
                                        <div class="add-cart">
                                            <h4><a href="preview.html">Add to Cart</a></h4>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                @endforeach
                                    <p>{{$sp_tuongtu->links()}}</p>
                            </div>
                        </div>
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
