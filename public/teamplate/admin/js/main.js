$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url) {
    if (confirm('Bạn có chắc chắn muốn xóa không ?')) {
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: { id },
            url: url,
            success: function(result) {
                if (result.error === false) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Xóa lổi rồi');
                }
            }

        })
    }
}
/*Upload File */
$('#upload').change(function() {
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);
    console.log({form});


    // $.ajax({
    //     processData: false,
    //     contentType: 'multipart/form-data',
    //     type: 'POST',
    //     dataType: 'JSON',
    //     headers:{
    //         // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    //     },
    //     data: form,
    //     url: '/admin/upload/services',
    //     success: function(results) {
    //         console.log({results});
    //         if (results.error === false) {
    //             $('#image_show').html('<a href="' + results.url + '" target="_blank">' +
    //                 '<img src="' + results.url + '" width="100px"></a>');

    //             $('#thumb').val(results.url);
    //         } else {
    //             alert('Upload File Lỗi');
    //         }
    //     }
    // });
});