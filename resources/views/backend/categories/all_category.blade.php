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
                    <a href="{{route('admin-category-add')}} " class="btn btn-primary">Thêm loại sản phẩm</a>
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
                        <th style="width: 10%">
                            STT
                        </th>
                        <th style="width: 30%">
                            Tên danh mục
                        </th>


                        <th style="width: 30%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($all_category as $key => $all)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $all->name }}</td>


                        <td class="project-actions text-right" style="width: 32%;">

                            <a class="btn btn-info btn-sm" href="{{route('admin-category-edit',$all->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a onclick="return confirm('Bạn có muốn xoá danh mục này không?')" class="btn btn-danger btn-sm" href="{{route('admin-category-delete',$all->id)}}">
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
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
