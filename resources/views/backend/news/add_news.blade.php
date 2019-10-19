@extends('admin_layout') @section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Thêm loại sản phẩm</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action="{{route('admin-news-save')}}" method="post" enctype="multipart/form-data">
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
                <label for="exampleInputEmail1">Tiêu đề</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Tiêu đề">
            </div>
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleInputPassword1">Nội dung</label>
                <textarea class="form-control"name="noidung" id="exampleInputPassword1" placeholder="Nội dung"></textarea>
            </div>
            @error('noidung')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleInputEmail1">Ảnh minh hoạ</label>
                <input type="file" name="image" class="form-control" id="exampleInputEmail1">
            </div>
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleInputEmail1">NGgày đăng</label>
                <input type="date" name="day" class="form-control" id="exampleInputEmail1" placeholder="Tiêu đề">
            </div>
            @error('day')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>


        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" name="add_news" class="btn btn-primary">Thêm tin tức</button>
        </div>
    </form>
</div>
@endsection
