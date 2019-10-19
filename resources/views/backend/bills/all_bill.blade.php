@extends('admin_layout') @section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách đơn hàng</h1>
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
                        <th style="width: 20%">Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th style="width: 20%">Ghi chú</th>
                        <th style="width: 20%">Ngày order</th>
                        <th style="width: 20%">Tên khách</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($all_bill as $key => $all)
{{--                        @php--}}
{{--                        dd($all->bill->customer->name);--}}
{{--                        @endphp--}}

                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td >{{ $all->product->name }}</td>
                        <td>{{$all->unit_price}}</td>
                        <td>{{ $all->quantity}}</td>
                        <td>{{$all->bill->note}}</td>
                        <td>{{$all->bill->date_order}}</td>
                        <td>{{$all->bill->customer->name}}</td>
                        <td>{{$all->bill->customer->email}}</td>
                        <td>{{$all->bill->customer->address}}</td>
                        <td>{{$all->bill->customer->phone_number}}</td>

                        <td class="project-actions text-right" style="width: 32%;">

                            <a onclick="return confirm('Bạn có muốn xoá sản phẩm này không?')" class="btn btn-danger btn-sm" href="{{route('admin-bill-delete',$all->id)}}">
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
{{--            <p>{{$all_product->links()}}</p>--}}
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
