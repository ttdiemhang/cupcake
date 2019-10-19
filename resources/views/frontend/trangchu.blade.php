@extends('master') @section('content')
<div class="content">
    <div class="header_slide">
        <div class="header_bottom_left">
            <div class="categories">
                <ul>
                    <h3>Loại bánh</h3>
                    @foreach($loai_sp as $loai)
                        <li><a href="{{route('loaisanpham',$loai->id)}}">{{$loai->name}}</a></li>
                    @endforeach
                </ul>
            </div>


            <div class="list-group">
                <p class="abc">
                    Tin tức mới
                </p>
                @foreach($news as $tt)
                <a href="{{route('news')}}" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1 title-news">{{$tt->title}}</h5>
                        <small>{{$tt->day}}</small>
                    </div>
                </a><a href="#" class="list-group-item list-group-item-action flex-column align-items-start">

                </a>
@endforeach
            </div>
        </div>

        <div class="header_bottom_right">

            <div class="content_top">
                <div class="heading">
                    <h3>Sản Phẩm Mới</h3>
                </div>
                <div class="see">

                    <p style="font-style: italic; font-family: sans-serif; font-size: 10pt; color: lightgoldenrodyellow;">
                        Tìm thấy {{count($new_product)}} sản phẩm </p>
                </div>
                <div class="clear"></div>
            </div>
            <div class="section_group">
                @foreach($new_product as $new)
                <div class="grid_1_of_4 images_1_of_4">
                    @if($new->promotion_price!=0)
                    <div class="text">Sale</div>
                    @endif
                    <a href="{{route('chitietsanpham',$new->id)}}"><img src="{{ Storage::url($new->image) }}" alt="" /></a>
                    <h2>{{$new->name}} </h2>
                    <div class="price-details">
                        <div class="price-number">
                            @if($new->promotion_price==0)
                            <p><span class="rupees" style="color: crimson;font-size: 14pt;">{{number_format($new->unit_price)}} đồng</span></p>
                            @else
                            <p><span class="rupees" style="text-decoration: line-through;">{{number_format($new->unit_price)}} đồng</span></p>
                            <p><span class="rupees" style="color: crimson;font-size: 14pt;">{{number_format($new->promotion_price)}} đồng</span></p>
                            @endif
                        </div>
                        <div class="add-cart">
                            <h4><a href="{{route('themgiohang',$new->id)}}">Add to Cart</a></h4>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                @endforeach
                <p>{{$new_product->links()}}</p>

            </div>
        </div>
        <div class="header_bottom_right">

            <div class="content_top">
                <div class="heading">
                    <h3>Sản phẩm khuyến mãi</h3>
                </div>
                <div class="see">

                    <p style="font-style: italic; font-family: sans-serif; font-size: 10pt; color: lightgoldenrodyellow;">
                        Tìm thấy {{count($sanpham_khuyenmai)}} sản phẩm </p>
                </div>
                <div class="clear"></div>
            </div>
            <div class="section_group">
                @foreach($sanpham_khuyenmai as $spkm)
                <div class="grid_1_of_4 images_1_of_4">
                    <a href="{{route('chitietsanpham',$spkm->id)}}"><img src="{{ Storage::url($spkm->image) }}" alt="" /></a>
                    <h2>{{$spkm->name}}  </h2>
                    <div class="price-details">
                        <div class="price-number">
                            <p><span class="rupees" style="text-decoration: line-through;">{{number_format($spkm->unit_price)}} đồng </span></p>
                            <p><span class="rupees" style="color: darkorange;font-size: 14pt;">{{number_format($spkm->promotion_price)}} đồng </span></p>
                        </div>
                        <div class="add-cart">
                            <h4><a href="{{route('themgiohang',$spkm->id)}}">Add to Cart</a></h4>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                    @endforeach
                    <p>{{$sanpham_khuyenmai->links()}}</p>

            </div>
        </div>
        <div class="clear"></div>
    </div>

</div>

@endsection
