$(
    () => {
        $('#pjax-user-container').on('click', '.btn-block-time', function (e) {
            e.preventDefault();
            console.log($("#user-form").attr('action'));
            $("#user-form").attr('action', $(this).attr('href'));
            $('#user-block_time').val('');

            $('#modal-block-time').modal('show');
        });

        $("#pjax-user-form").on('click', '.btn-modal-close', function(e){
            e.preventDefault();
            $('#modal-block-time').modal('hide');
        });

        $("#pjax-user-form").on('pjax:end', function(e){
            e.preventDefault();
            $('#modal-block-time').modal('hide');
            $.pjax.reload('#pjax-user-container');
        });
    }
)