@extends('admin.layout.main')

@section('content')
    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0"> {{ $title }}</h3>
                    </div>
                </div>
            </div>
            <!-- Row end  -->
            {{-- List --}}
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 50px">#</th>
                                        <th>Họ tên</th>
                                        <th>Địa chỉ Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Trạng thái</th>
                                        <th>Xử lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $key => $add)
                                    <tr>
                                        <td>{{ $add->id }}</td>
                                        <td>{{ $add->name }}</td>
                                        <td>{{ $add->email }}</td>
                                        <td>{{ $add->phone }}</td>
                                        <td>{{ $add->address }}</td>
                                        <td>{!! \App\Helpers\Helper::active($add->active) !!}</td>
                                        <td>
                                            <div class="btn-group" role="group"
                                                aria-label="Basic outlined example">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-toggle="modal">
                                                    <a class="btn btn-primary btn-sm"
                                                        href="/admin/members/edit/{{ $add->id }}">
                                                        <i class="icofont-edit text-success"></i>
                                                    </a>
                                                </button>

                                                <button type="button" class="btn btn-outline-secondary deleterow">
                                                    <a href="#"
                                                        onclick="removeRow({{ $add->id }}, '/admin/members/destroy')">
                                                        <i class="icofont-ui-delete text-danger"></i>
                                                    </a>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $admins->links() !!} 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
