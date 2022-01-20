$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


// upload file
$('#upload').change(function (){
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        datatype: 'JSON',
        data: form,
        url: '/profile-edit/upload/services',
        success: function (results){
            if(results.error == false){
                $('#image_show').html('<a href="' + results.url + '" target="_blank">'+
                    '<img src="' + results.url + '" width="150px"> </a>');

                $('#thumb').val(results.url);
            }else{
                alert('Upload File Lỗi');
            }
        }

    });
});

$(document).ready(function (){
    $('#sort').on('change',function (){
        var url = $(this).val();
        // alert(url);
        if(url){
            window.location = url;
        }
        return false;
    });
});

function addWishLish(product_id,customer_id,coupon_id, url)
{
        $.ajax({
            type: 'post',
            datatype: 'JSON',
            data: {
                product_id: product_id,
                customer_id: customer_id,
                coupon_id: coupon_id
            },
            url: url,
            cache: false,
            success: function (result) {
                // alert(result);
                if(result.error == false){
                    alert(result.message);
                    location.reload();
                }else {
                    alert('Đã tồn tại trong danh sách yêu thích');
                }
            }
        });
}

function removeRow(id, url)
{
    if(confirm('Bạn chắc chắn muốn xóa khỏi yêu thích ?')){
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: {id},
            url: url,
            success: function (result) {
                if(result.error == false){
                    alert(result.message);
                    location.reload();
                }else {
                    alert('Xóa lỗi. Vui lòng thử lại');
                }
            }
        });
    }
}

// function add_compare(product_id){
//     document.getElementById('title-compane').innerText = 'Chỉ cho phép so sánh tối đa 3 sách';
//     var id = product_id;
//     var name = document.getElementById('wish_productname'+id).value;
//     var price = document.getElementById('wish_productprice'+id).value;
//     var price_sale = document.getElementById('wish_productprice_sale'+id).value;
//     var image = document.getElementById('wish_productimage'+id).src;
//     var url = document.getElementById('wish_producturl'+id).href;
// }



