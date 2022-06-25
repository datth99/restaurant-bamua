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

            <!-- Add Tickit-->
            <div class="modal-body">
                <div class="deadline-form">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Kích hoạt</label>
                            <div>
                                <input type="radio" id="active" value="1" name="active"
                                    {{ $admin->active == 1 ? 'checked=""' : '' }}>
                                <label for="active">Có</label>
                            </div>
                            <div>
                                <input type="radio" id="no_active" value="0" name="active"
                                    {{ $admin->active == 0 ? 'checked=""' : '' }}>
                                <label for="no_active">Không</label>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"><a href="/admin/members/list">Hủy</a></button>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection