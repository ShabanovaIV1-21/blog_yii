$(
    ()=> {
        $('#admin-user-pjax').on('click', '.btn-modal', function(e) {
            e.preventDefault();
            $('#form-block').attr('action', $(this).attr('href'));
            $("#user-block_time").val('');
            $("#block-modal").modal('show');
        });

        $('#form-block-pjax').on('pjax:end', function() {
            $("#block-modal").modal('hide');
            $.pjax.reload('#admin-user-pjax');
        });

        $('#admin-user-pjax').on('click', '.btn-block', function(e) {
            e.preventDefault();
            // console.log(123)
            $("#block-forever-modal").modal('show');
        });

        $('#form-block-pjax').on('pjax:end', function() {
            $("#block-modal").modal('hide');
            $.pjax.reload('#admin-user-pjax');
        });

        // $('#admin-user-pjax').on('click', '.btn-close-modal', function(e) {
        //     e.preventDefault();
        //     console.log(123)
        //     $("#block-forever-modal").modal('hide');
        // });

        // $('#pjax-confirm-modal').on('pjax:end', function() {
        //     $("#block-forever-modal").modal('hide');
        //     $.pjax.reload('#admin-user-pjax');
        // })
    }
)