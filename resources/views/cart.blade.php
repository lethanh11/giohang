@extends('home')

@section('title', 'Show Giỏ Hàng')

@section('content')
<div class="cart_wrapper">
    @include('compoments')
</div>
<script>
    function cartUpdate(event){
        event.preventDefault();
        let urlUpdateCart = $('.update_cart_url').data('url');
        let id = $(this).data('id');
        let quatity = $(this).parents('tr').find('input.quatity').val();
        $.ajax({
            type: 'GET',
            url: urlUpdateCart,
            data: {id: id, quatity: quatity},
            success: function (data){
                if(data.code === 200){
                    // console.log(data['compoments']);
                    $('.cart_wrapper').html(data['compoments']);
                    toastr["success"]("Cập Nhật Phẩm Thành Công");
                }

            },

            error: function (){

            }
        });
    }
    function cartDelete(event){
        event.preventDefault();
        let urlDelete = $('.cart').data('url');
        let id = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: urlDelete,
            data: {id: id},
            success: function (data){
                if(data.code === 200){
                    $('.cart_wrapper').html(data.compoments);
                    toastr["success"]("Xóa Phẩm Thành Công");
                }
            },

            error: function (){

            }
        });
    }
    $(function(){
        $(document).on('click','.cart_update',cartUpdate);
        $(document).on('click','.cart_delete',cartDelete);
    })
</script>
@endsection
