@extends('admin_layout') @section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Cập nhật loại sản phẩm</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @foreach($edit_member as $key=>$edit_value)
    <form role="form" action="{{route('admin-member-update',$edit_value->id)}}" method="post">
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
                <label for="exampleInputEmail1">Họ và tên</label>
                <input type="text" value="{{$edit_value->name}}" name="name" class="form-control" id="exampleInputEmail1" placeholder="Họ và tên">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{$edit_value->email}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Giới tính</label>
                <input type="text" name="gender" class="form-control" id="exampleInputEmail1" value="{{$edit_value->gender}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Địa chỉ</label>
                <input type="text" name="address" class="form-control" id="exampleInputEmail1"value="{{$edit_value->address}}" >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">SĐT</label>
                <input type="text" name="phone_number" class="form-control" id="exampleInputEmail1"value="{{$edit_value->phone_number}}" >
            </div>

        </div>


        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" name="update_member" class="btn btn-primary">Cập nhật thành viên</button>
        </div>
    </form>
        @endforeach
</div>
@endsection
