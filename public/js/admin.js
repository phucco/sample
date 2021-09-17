$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Upload files
$("#file").change(function () {
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload',
        success: function (result) {
            if (result.error === false) {
                $("#thumbnail_preview").html('<a href="' + result.path + '" target="_blank"><img class="img-thumbnail" src="' + result.path + '"/></a>');
                $("#thumbnail").val(result.path);
            } else {
                alert("Error uploading thumbnail");
            }
            console.log(result.error);
        }
    });
});

function removeRow(id, url) {
    if (confirm('Không thể khôi phục sau khi xóa. Tiếp tục xóa?')) {
        $.ajax({
            type: 'DELETE',
            dataType: 'JSON',
            data: {id},
            url: url,
            success: function(result) {
                if (result.error === false) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert("Xóa lỗi, vui lòng thử lại.");
                }
            }
        });
    }
}