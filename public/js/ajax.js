$(document).ready(function () {
    $(".btn-submit").click(function (e) {
        var table = $("#table-data").DataTable();
        e.preventDefault();
        var link = $('.btn-submit').attr('href');
        var form = $('.btn-submit').attr('name');
        var i = document.getElementById(form);
        $.ajax({
            url: link,
            type: 'post',
            data: $(i).serialize(),
            dataType: 'json',
            success: function (response) {
                if ($.isEmptyObject(response.error)) {
                    toast('success', response.success);
                    i.reset();
                    table.ajax.reload(null, false);
                    $(".myModal").modal("hide");
                } else {
                    toast('errors', response.error);
                    // printErrorMsg(response.error);
                }
                // if (response) {

                // } else {
                //     swal.fire("Error!", response.message, "error");
                // }

            }
        });

    });
    // function printErrorMsg (msg) {
    //     $(".print-error-msg").find("ul").html('');
    //     $(".print-error-msg").css('display','block');
    //     $.each( msg, function( key, value ) {
    //         $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    //     });
    // }

});
// $('.edit').on('click', function (event) {
//     event.preventDefault();
//     $('.modal-footer').empty();
//     let id = $(this).data('id');
//     var link = $('.edit').on('click').attr('content');
//     var pisah = link.split(",=+");
//     var hapus = pisah.pop();
//     pisah.push(id);
//     var method = pisah.join("");
//     $.ajax({
//         url: method,
//         type: 'get',
//         dataType: 'json',
//         success: function (response) {
//             $('#namaKategori').val(response.nama_kategori);
//             $('.simpan').remove();
//             $('.form-group').append(`<input type="hidden" class="form-control" value="` + response.id + `" name="id" id="idKategori" required />`);
//         }
//     });
// });
