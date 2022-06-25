
@extends('admin.layout.main')

@section('content')
    <div class="tab-pane fade active show" id="Invoice-Simple">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="card p-xl-5 p-lg-4 p-0">
                    <div class="card-body">
                        <div class="mb-3 pb-3 border-bottom">
                            Hóa đơn
                            <strong>{{ date('d/m/Y-H:m', strtotime($customer->created_at)) }}</strong>
                            {{-- {{ date('t, d, m, y', strtotime($customer->created_at)) }} --}}
                            <span class="float-end"> <strong>Tình trạng:</strong>
                                {{ $customer->status == 1 ? 'Đang xử lý' : 'Chưa xử lý' }}</span>
                        </div>

                        <div class="row mb-4">
                            @foreach ($abouts as $about)
                            <div class="col-sm-6">
                                <h6 class="mb-3">Từ: </h6>
                                <div>Cửa hàng: <strong>Mì Quảng Bà Mua</strong></div>
                                <div>Địa chỉ: {{ $about->address }}</div>
                                <div>Email: {{ $about->email }}</div>
                                <div>Số điện thoại: {{ $about->phone }}</div>
                            </div>
                            @endforeach
                            

                            <div class="col-sm-6">
                                <h6 class="mb-3">Đến:</h6>
                                <div> Tên khách hàng:<strong> {{ $customer->name }}</strong></div>
                                <div>Địa chỉ:<strong>{{ $customer->address }}</strong></div>
                                <div>Email: <strong>{{ $customer->email }}</strong></div>
                                <div>Số điện thoại: <strong>{{ $customer->phone }}</strong></div>
                                <div>Ghi chú: <strong>{{ $customer->content }}</strong></div>
                            </div>
                        </div> <!-- Row end  -->

                        <div class="table-responsive-sm">
                            @php 
                            $total = 0;
                            $ship = 15000;
                             @endphp
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Ảnh</th>
                                        <th>Đồ uống</th>
                                        <th class="text-end">Giá</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-end">TẤT CẢ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $key => $cart)
                                        @php
                                            $price = $cart->price * $cart->pty;
                                            $total += $price;
                                            $totalss = $total + $ship;
                                        @endphp
                                        <tr>

                                            <td class="text-center">{{ $cart->id }}</td>
                                            <td><img src="{{ $cart->product->thumb }}" alt="IMG" style="width: 100px"></td>
                                            <td>{{ $cart->product->name }}</td>
                                            <td class="text-end">{{ number_format($cart->price, 0, '', '.') }}đ</td>
                                            <td class="text-center">{{ $cart->pty }}</td>
                                            <td class="text-end">{{ number_format($price, 0, '', '.') }}đ</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-sm-5">

                            </div>

                            <div class="col-lg-6 col-sm-5 ms-auto">
                                <table class="table table-clear">
                                    <tbody>
                                        <tr>
                                            <td><strong>Tổng phụ</strong></td>
                                            <td class="text-end">{{ number_format($total, 0, '', '.') }}đ</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Phí ship</strong></td>
                                            <td class="text-end">15.000 đ</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Thành tiền</strong></td>
                                            <td class="text-end">
                                                <strong>{{ number_format($totalss, 0, '', '.') }}đ</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- Row end  -->
                        <!-- Row end  -->
                    </div>

                </div>
            </div>
        </div> <!-- Row end  -->
    </div>

@endsection
@section('script')
<script src="teamplate/admin/assets/app.js"></script>
@endsection