@extends('admin_layout') @section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Thêm sản phẩm</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action="{{route('admin-product-save')}}" method="post" enctype="multipart/form-data">
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
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm">
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                <textarea class="form-control"name="description" id="exampleInputPassword1" placeholder="Mô tả sản phẩm"></textarea>
            </div>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleInputEmail1">Ảnh sản phẩm</label>
                <input type="file" name="image" class="form-control" id="exampleInputEmail1">
            </div>
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleInputEmail1">Giá sản phẩm</label>
                <input type="text" name="unit_price" class="form-control" id="exampleInputEmail1" placeholder="Giá sản phẩm">
            </div>
            @error('unit_price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleInputEmail1">Giá khuyến mãi</label>
                <input type="text" name="promotion_price" class="form-control" id="exampleInputEmail1" placeholder="Giá khuyến mãi">
            </div>
            @error('promotion_price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleInputEmail1">Đơn vị tính</label>
                <input type="text" name="unit" class="form-control" id="exampleInputEmail1" placeholder="Đơn vị tính">
            </div>
            @error('unit')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">

                @php $product_new = config('common.product_new');
                @endphp
                <label for="exampleInputEmail1">Hàng mới</label>
                <select name="new" class="form-control">
                    @foreach($product_new as $key=> $new)
                        <option value="{{$key}}">{{$new}}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label>Loại sản phẩm</label>
                <select name="category" class="form-control">
                    @foreach($category_product as $key=> $cate)
                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" name="add_product" class="btn btn-primary">Thêm sản phẩm</button>
        </div>
    </form>
</div>
@endsection
