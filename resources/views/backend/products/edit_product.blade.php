@extends('admin_layout') @section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Cập nhật sản phẩm</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @foreach($edit_product as $key=>$pro)
        <form role="form" action="{{route('admin-product-update',$pro->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                {{--show message success--}}
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                {{--show message fail--}}
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$pro->name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                    <textarea class="form-control"name="description" id="exampleInputPassword1" >{{$pro->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Ảnh sản phẩm</label>
                    <input type="file" name="image" class="form-control" id="exampleInputEmail1">
                    <img src="{{Storage::url($pro->image)}} " height="100" width="100">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                    <input type="text" name="unit_price" class="form-control" id="exampleInputEmail1" value="{{$pro->unit_price}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Giá khuyến mãi</label>
                    <input type="text" name="promotion_price" class="form-control" id="exampleInputEmail1" value="{{$pro->promotion_price}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Đơn vị tính</label>
                    <input type="text" name="unit" class="form-control" id="exampleInputEmail1"value="{{$pro->unit}}" >
                </div>
                <div class="form-group">

                    @php $product_new = config('common.product_new');
                    @endphp
                    <label for="exampleInputEmail1">Hàng mới</label>
                    <select name="new" class="form-control">
                        @foreach($product_new as $key=> $new)
                            @if($new==$pro->new)
                            <option  value="{{$key}}">{{$new}}</option>
                            @else
                                <option selected value="{{$key}}">{{$new}}</option>
                            @endif
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label>Loại sản phẩm</label>
                    <select name="category" class="form-control">
                        @foreach($category_product as $key=> $cate)
                            @if($cate->id==$pro->id)
                            <option selected value="{{$cate->id}}">{{$cate->name}}</option>
                            @else
                                <option value="{{$cate->id}}">{{$cate->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>


            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" name="add_product" class="btn btn-primary">Cập nhật sản phẩm</button>
            </div>
        </form>
            @endforeach
    </div>
@endsection
