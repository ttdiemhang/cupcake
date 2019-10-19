@extends('admin_layout') @section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Thêm loại sản phẩm</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action="{{route('admin-category-save')}}" method="post">
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
            @error('category_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleInputEmail1">Tên danh mục</label>
                <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">

            </div>

        </div>


        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" name="add_category" class="btn btn-primary">Thêm danh mục</button>
        </div>
    </form>
</div>
@endsection
