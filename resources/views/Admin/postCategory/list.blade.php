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
                        <div class="col-auto d-flex w-sm-100">
                            <a href="/admin/postcategories/add">
                                <button type="button" class="btn btn-dark btn-set-task w-sm-100">
                                    <i class="icofont-plus-circle me-2 fs-6"></i>Thêm danh mục bài viết
                                </button>
                            </a>
                        </div>
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
                                        <th>Tên danh mục</th>
                                        <th>Trạng thái</th>
                                        <th>Xử lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($postcategories as $key => $PostCategory)
                                    <tr>
                                        <td>{{ $PostCategory->id }}</td>
                                        <td>{{ $PostCategory->name }}</td>
                                        <td>{!! \App\Helpers\Helper::active($PostCategory->active) !!}</td>
                                        <td>
                                            <div class="btn-group" role="group"
                                                aria-label="Basic outlined example">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-toggle="modal">
                                                    <a class="btn btn-primary btn-sm"
                                                        href="/admin/postcategories/edit/{{ $PostCategory->id }}">
                                                        <i class="icofont-edit text-success"></i>
                                                    </a>
                                                </button>

                                                <button type="button" class="btn btn-outline-secondary deleterow">
                                                    <a href="#"
                                                        onclick="removeRow({{ $PostCategory->id }}, '/admin/postcategories/destroy')">
                                                        <i class="icofont-ui-delete text-danger"></i>
                                                    </a>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{-- {!! $postcategories->links() !!} con loi sly--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
