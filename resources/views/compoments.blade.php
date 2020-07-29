
<div class="cart" data-url="{{route('deleteCart')}}">
    <div class="container">
        <div class="row">
            <table class="table update_cart_url" data-url="{{ route('updateCart') }}">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên Sản Phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Tổng Giá</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $total =0;

                    @endphp

                    @foreach($carts as $id => $cartItem)
                        @php
                        $total += $cartItem['price'] * $cartItem['quantity'];
                        @endphp
                        <tr>
                            <th scope="row">{{ $id }}</th>
                            <td><img style="width:100px;height:70px" src="{{ $cartItem['image'] }}" alt=""></td>
                            <td>{{ $cartItem['name'] }}</td>
                        <td><input style="width:50px" type="number" id='{{$id}}' value="{{ $cartItem['quantity'] }}"   min="1" class='quatity'>
                            </td>
                            <td>{{ number_format($cartItem['price']) }} VNĐ</td>
                            <td>{{ number_format($cartItem['price'] * $cartItem['quantity']) }} VNĐ</td>
                            <td><a href="" data-id="{{ $id }}" class="btn btn-primary cart_update">Cập Nhật</a>
                                <a href="" data-id="{{ $id }}" class="btn btn-danger cart_delete">xóa</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-md-12">
                <h2>Tổng giá: {{ number_format($total) }} VNĐ</h2>
            </div>
        </div>
    </div>
</div>

