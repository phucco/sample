$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(slug, url) {
    if (confirm('Không thể khôi phục sau khi xóa. Tiếp tục xóa?')) {
        $.ajax({
            type: 'DELETE',
            dataType: 'JSON',
            data: {slug},
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

$(document).ready(function () {
    $(".delete-button").click(function() {
        alert('Are you sure?');
    });

    $("#file").change(function () {
        const form = new FormData();
        var file = $(this)[0].files[0];
        if (file !== undefined) {
            form.append('file', file);
            form.append('module', $("#module").val());

            $.ajax({
                processData: false,
                contentType: false,
                type: 'POST',
                dataType: 'JSON',
                data: form,
                url: '/admin/upload/store',
                success: function (result) {
                    var oldPath = $("#thumbnail").val();
                    if (result.error === false) {
                        $("#thumbnail_preview").html('<a href="' + result.path + '" target="_blank"><img class="img-thumbnail" src="' + result.path + '"/></a>');
                        $("#thumbnail").val(result.path);

                        $.ajax({
                            type: 'POST',
                            dataType: 'JSON',
                            data: {path: oldPath},
                            url: '/admin/upload/delete',
                            success: function (result) {
                            }
                        });
                        
                    } else {
                        alert("Error uploading thumbnail");
                    }
                }
            });
        } else {
            var oldPath = $("#thumbnail").val();
            if (oldPath != '') {
                $.ajax({
                    type: 'POST',
                    dataType: 'JSON',
                    data: {path: oldPath},
                    url: '/admin/upload/delete',
                    success: function (result) {
                    }
                });
            }
            $("#thumbnail").val('');
            $("#thumbnail_preview").html('');
        }      
    });

    $(".form-check-role-permission").click(function () {        
        var roleSlug = $("input[name='roleSlug']").val();
        var permissionSlug = $(this).attr('name');

        if ($(this).prop("checked") === true) {
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                data: {role: roleSlug, permission: permissionSlug},
                url: '/admin/attach/roles/permissions',
                success: function (result) {

                }
            });
        } else if ($(this).prop("checked") === false) {
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                data: {role: roleSlug, permission: permissionSlug},
                url: '/admin/detach/roles/permissions',
                success: function (result) {

                }
            });
        }
    });
});


