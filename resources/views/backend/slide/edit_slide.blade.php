@extends('admin_layout') @section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Cập nhật slide</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @foreach($edit_slide as $key=>$edit_value)
    <form role="form" action="{{route('admin-slide-update',$edit_value->id)}}" method="post" enctype="multipart/form-data">
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
                <label for="exampleInputEmail1">Slide</label>
                <input type="file" name="image" class="form-control" id="exampleInputEmail1">
                <img src="{{Storage::url($edit_value->image)}} " height="100" width="100">
            </div>

        </div>


        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" name="update_slide" class="btn btn-primary">Cập nhật slide</button>
        </div>
    </form>
        @endforeach
</div>
@endsection
