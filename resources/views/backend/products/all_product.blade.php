@extends('admin_layout') @section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Liệt kê danh mục sản phẩm</h1>
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
                    <a href="{{route('admin-product-add')}} " class="btn btn-primary">Thêm sản phẩm</a>
                </div>


            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Danh mục</h3>


                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th style="width: 90%">Mô tả</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Giá Khuyến mãi</th>
                        <th>Đơn vị tính</th>
                        <th>Hàng mới</th>
                        <th>Loại sản phẩm</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($all_product as $key => $all)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td >{{ $all->name }}</td>
                        <td style="font-size: 9pt;">{{$all->description}}</td>
                        <td><img src="{{Storage::url($all->image)}} " height="100" width="100"></td>
                        <td>{{$all->unit_price}}</td>
                        <td>{{$all->promotion_price}}</td>
                        <td>{{$all->unit}}</td>
                        <td>{{$all->new}}</td>
                        <td>{{$all->product_type->name}}</td>

                        <td class="project-actions text-right" style="width: 32%;">

                            <a class="btn btn-info btn-sm" href="{{route('admin-product-edit',$all->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a onclick="return confirm('Bạn có muốn xoá sản phẩm này không?')" class="btn btn-danger btn-sm" href="{{route('admin-product-delete',$all->id)}}">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
            <p>{{$all_product->links()}}</p>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
