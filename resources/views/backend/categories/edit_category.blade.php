@extends('admin_layout') @section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Cập nhật loại sản phẩm</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @foreach($edit_category as $key=>$edit_value)
    <form role="form" action="{{route('admin-category-update',$edit_value->id)}}" method="post">
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
                <label for="exampleInputEmail1">Tên danh mục</label>
                <input type="text" value="{{$edit_value->name}}" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
            </div>

        </div>


        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" name="update_category" class="btn btn-primary">Cập nhật danh mục</button>
        </div>
    </form>
        @endforeach
</div>
@endsection
