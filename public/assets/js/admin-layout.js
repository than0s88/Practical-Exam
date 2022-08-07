$(document).ready(function () {

    //EDIT PROFILE AJAX FUNCTION
    $("#btn-profile").click(function (event) {
        event.preventDefault();
        var form = $('#form-profile')[0];
        var data = new FormData(form);
        $.ajax({
            url: SITE_URL + '/profile/update',
            beforeSend: function () {
                $('#btn-profile').text('Saving...');
            },
            type: "POST",
            enctype: 'multipart/form-data',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: data,
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data.errors) {
                    for (var count = 0; count < data.errors.length; count++) {
                        toastr.error(data.errors[count])
                    }
                    $('#btn-profile').text('Save');
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Profile Updated Successfully!'
                    })
                    setTimeout(function () {
                        location.reload();
                        $('#modal-profile').modal('hide');
                        $('#form-profile')[0].reset();
                        $('#btn-profile').text('Save');
                    }, 700);
                }
            } //END SUCCESS
        })

    });
    //END FUNCTION

}); //END DOCUMENT READY FUNCTION


//DISPLAY IMAGE ONCHANGE FUNCTION
    $(document).on("change", ".profile_user_image", function () {
        var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        if (/^image/.test(files[0].type)) { // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            reader.onloadend = function () { // set image data as background of div
                //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                uploadFile.closest(".profile_image_up").find('.profile_image_preview').css("background-image", "url(" + this.result + ")");
                $('.profile_image_preview').css('width', '300px');
                $('.profile_image_preview').css('height', '300px');
                $('.profile_image_preview').css('border-radius', '50%');
                $('.profile_image_preview').css('margin', '0 80px 0 80px');
            }
        }
    });

//END FUNCTION