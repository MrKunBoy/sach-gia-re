$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url)
{
    if(confirm('Bạn chắc chắn muốn xóa danh mục này ?')){
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

function removeCmt(id, url)
{
    if(confirm('Bạn chắc chắn muốn xóa bình luận này ?')){
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

$('.btn-reply-comment').click(function (){

    var comment_id = $(this).data('comment_id');
    var comment = $('.reply-comment-'+comment_id).val();
    var url = $(this).data('url');
    // alert(comment);

    $.ajax({
        type: 'post',
        datatype: 'JSON',
        data: {
            comment_id: comment_id,
            content_comment: comment
        },
        url: url,
        cache: false,
        success: function (result) {

            if(result.error == false){
                alert(result.message);
                location.reload();
                // alert(url);
            }else {
                alert('Lỗi thêm bình luận. Mời thử lại');
            }
        }
    });
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
        url: '/admin/upload/services',
        success: function (results){
            if(results.error == false){
                $('#image_show').html('<a href="' + results.url + '" target="_blank">'+
                    '<img src="' + results.url + '" width="100px"> </a>');

                $('#thumb').val(results.url);
            }else{
                alert('Upload File Lỗi');
            }
        }

    });
});
