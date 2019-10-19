@extends('admin_layout') @section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Cập nhật loại sản phẩm</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @foreach($edit_news as $key=>$edit_value)
    <form role="form" action="{{route('admin-news-update',$edit_value->id)}}" method="post" enctype="multipart/form-data">
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
                <input type="text" value="{{$edit_value->title}}" name="title" class="form-control" id="exampleInputEmail1" placeholder="Tiêu đề">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nội dung</label>
                <input type="text" value="{{$edit_value->content}}" name="noidung" class="form-control" id="exampleInputEmail1" placeholder="Nội dung">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Ảnh minh hoạ</label>
                <input type="file" name="image" class="form-control" id="exampleInputEmail1">
                <img src="{{Storage::url($edit_value->image)}} " height="100" width="100">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Ngày đăng</label>
                <input type="text" value="{{$edit_value->day}}" name="day" class="form-control" id="exampleInputEmail1" placeholder="Ngày đăng">
            </div>

        </div>


        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" name="update_news" class="btn btn-primary">Cập nhật tin tức</button>
        </div>
    </form>
        @endforeach
</div>
@endsection
