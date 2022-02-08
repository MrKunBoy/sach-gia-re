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

//add class active
function addClass(ma) {
    document.getElementById('dieukien_'+ma).className += " active";
}

function copyCode(code) {
    prompt("Copy mã bên dưới để sử dụng. Sau khi copy, hệ thống sẽ tự chuyển bạn đến trang khuyến mãi:", code);
    // window.open(link, '_blank');
}

function addComment(product_id,customer_id, url)
{
    var content = $('.content-comment').val();
    $.ajax({
        type: 'post',
        datatype: 'JSON',
        data: {
            product_id: product_id,
            customer_id: customer_id,
            content_comment: content
        },
        url: url,
        cache: false,
        success: function (result) {
            // alert(result);
            if(result.error == false){
                alert(result.message);
                location.reload();

            }else {
                alert('Lỗi thêm bình luận. Mời thử lại');
            }
        }
    });
}


