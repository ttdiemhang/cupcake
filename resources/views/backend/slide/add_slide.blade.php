@extends('admin_layout') @section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Thêm slide</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action="{{route('admin-slide-save')}}" method="post" enctype="multipart/form-data">
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
            </div>
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>


        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" name="add_slide" class="btn btn-primary">Thêm slide</button>
        </div>
    </form>
</div>
@endsection
