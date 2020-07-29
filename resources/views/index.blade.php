@extends('home')
@section('title', 'Sản Phẩm')

@section('content')
    <div class="products mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-3 text-primary ">
                    <h1>Danh Mục Sản Phẩm</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('showCart') }}" class="btn btn-primary mb-3">Show Cart </a>
                </div>
            </div>

            <div class="row">
                @foreach($products as $item)

                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ $item->image_path }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <p class="card-text">
                                    {{ number_format($item->price) }} VNĐ
                                </p>
                                <p class="card-text">
                                    {{ $item->description }}
                                </p>
                                <a href="#" data-url="{{ route('addTocart', ['id' => $item->id]) }}"
                                    class="btn btn-primary add_to_cart">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <script>
        function addTocart(event) {
            // Ngăn chuyển chang với lệnh preventDefault()
            event.preventDefault();
            let urlCart = $(this).data('url');
            $.ajax({
                type: "GET",
                url: urlCart,
                dataType: 'json',
                success: function(data) {
                    if (data.code === 200) {
                        toastr["success"]("Thêm Sản Phẩm Thành Công");
                    }
                },
                error: function() {

                }
            });
        }
        $(function() {
            $('.add_to_cart').on('click', addTocart);
        });

    </script>
@endsection
