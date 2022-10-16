
$(document).ready(function(){
        //ADD AJAX FUNCTION
        $("#btn-add").click(function (event) {
            event.preventDefault();
            var form = $('#form-add')[0];
            var data = new FormData(form);
            $.ajax({
                url: SITE_URL + '/user-add',
                beforeSend: function () {
                    $('#btn-add').text('Submitting...');
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
                        $('#btn-add').text('Save');

                    } else {

                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'User Added Successfully'
                        })

                        setTimeout(function () {
                            location.reload();
                            $('#modal-add').modal('hide');
                            $('#btn-add').text('Save');
                            $('#form-add')[0].reset();
                        }, 700);

                    }
                } //END SUCCESS
            })

        });
        //END FUNCTION

        //EDIT AJAX FUNCTION
        $("#btn-edit").click(function (event) {
            event.preventDefault();
            var form = $('#form-edit')[0];
            var data = new FormData(form);
            var id = $('#delete_id').val();
            $.ajax({
                url: SITE_URL + '/user-update',
                beforeSend: function () {
                    $('#btn-edit').text('Submitting...');
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

                        $('#btn-edit').text('Save');

                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            showConfirmButton: false,
                            text: 'Record Update Successfully',
                        })

                        setTimeout(function () {
                            location.reload();
                            $('#modal-edit').modal('hide');
                            $('#btn-edit').text('Save');
                            $('#form-edit')[0].reset();
                        }, 700);

                    }
                } //END SUCCESS
            })

        });
        //END FUNCTION

        //DELETE SINGLE FUNCTION
        $("button.btn-delete-single-confirm").click(function () {
            var id = $('#delete_id').val();
            $.ajax({
                url: SITE_URL + '/user-delete',
                beforeSend: function () {
                    $('.btn-delete-single-confirm').text('Deleting...');
                },
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: 'id=' + id,
                success: function (data) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Record Deleted Successfully!',
                        showConfirmButton: false,
                    })

                    setTimeout(function () {
                        location.reload();
                        $('#modal-delete').modal('hide');
                        $('.btn-delete-single-confirm').text('Delete');
                    }, 700);
                }
            });
        });
        //END FUNCTION

        //EDIT MODAL FUNCTION

        $('#modal-edit').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')
            var role = button.data('role')
            var name = button.data('name')
            var email = button.data('email')
            var image = button.data('image')

            var modal = $(this)
            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #role').val(role)
            modal.find('.modal-body #name').val(name)
            modal.find('.modal-body #email').val(email)

            $('.edit_image_preview').css("background-image", "url(/storage/image/" + image + ")");
            $('.edit_image_preview').css('width', '300px');
            $('.edit_image_preview').css('height', '300px');
            $('.edit_image_preview').css('border-radius', '50%');
            $('.edit_image_preview').css('margin', '0 80px 0 80px');


        });
        //END FUNCTION




        //END DOCUMENT READY FUNCTION

        //DELETE MODAL FUNCTION
        $('#modal-delete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #delete_id').val(id)
        })
        //END FUNCTION

        //DISPLAY IMAGE ONCHANGE FUNCTION

            //START ADD FUNCTION PREVIEW

            $(document).on("change", ".add_user_image", function () {
                var uploadFile = $(this);
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
                if (/^image/.test(files[0].type)) { // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file
                    reader.onloadend = function () { // set image data as background of div
                        uploadFile.closest(".add_image_up").find('.add_image_preview').css("background-image", "url(" + this.result + ")");
                        $('.add_image_preview').css('width', '300px');
                        $('.add_image_preview').css('height', '300px');
                        $('.add_image_preview').css('border-radius', '50%');
                        $('.add_image_preview').css('margin', '0 80px 0 80px');

                    }
                }
            });
            //END FUNCTION
            //END ADD FUNCTION PREVIEW


            //START EDIT FUNCTION PREVIEW

            $(document).on("change", ".edit_user_image", function () {
                var uploadFile = $(this);
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
                if (/^image/.test(files[0].type)) { // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file
                    reader.onloadend = function () { // set image data as background of div
                        uploadFile.closest(".edit_image_up").find('.edit_image_preview').css("background-image", "url(" + this.result + ")");
                        $('.edit_image_preview').css('width', '300px');
                        $('.edit_image_preview').css('height', '300px');
                        $('.edit_image_preview').css('border-radius', '50%');
                        $('.edit_image_preview').css('margin', '0 80px 0 80px');

                    }
                }
            });
            //END FUNCTION
            //END EDIT FUNCTION PREVIEW


        //END FUNCTION

});
