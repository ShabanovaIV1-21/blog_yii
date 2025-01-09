$(
    () => {
        // $('#comment-form').on('click', function(e) {
        //     // e.preventDefault();
        //     // $('#form-cancel').attr('action', $(this).attr('href'));
        //     // $('#cancel-modal').modal('show');
        // });

        // $('#form-cancel-pjax').on('click', '.btn-modal-close', function(e) {
        //     e.preventDefault();
        //     $('.#cancel-modal').modal('hide');
        // });

        $('#comment-form').on('pjax:end', () => {
            // $('.#cancel-modal').modal('hide');
            $('#comment-text').val('');

            $.pjax.reload({
                container:"#comment-list",
                pushState: false,
                replaceState: false,
                timeout: 5000,
            })
        });


        $('#comment-pjax-container').on('pjax:beforeSend', '#comment-form', () => {
            $('#comment-pjax-container').append($('#answer-comment'));
            $('#answer-comment').addClass('d-none');
            $('.btn-close').addClass('d-none');



            // $('.#cancel-modal').modal('hide');
            // $('#comment-text').val('');

            // $.pjax.reload({
            //     container:"#comment-list",
            //     pushState: false,
            //     replaceState: false,
            //     timeout: 5000,
            // })
        });

        // $('.btn-answer').on('click', () => {
        //     // $('.#cancel-modal').modal('hide');
        //     $('.answer-comment').removeClass('d-none');

        //     // $.pjax.reload({
        //     //     container:"#comment-list",
        //     //     pushState: false,
        //     //     replaceState: false,
        //     //     timeout: 5000,
        //     // })
        // });

        // $('#comment-list').on('click', '.btn-answer', function (e) {
        //     e.preventDefault();
        //     console.log($(this).attr('href'));

        //     $('#form-comment').attr('action', $(this).attr('href'));
        //     console.log($('#form-comment'));
        //     $('#comment-text').val('');
        //     $('#answer-modal').modal('show');
        // })

        // $('#comment-answer').on('pjax:end', function(){
        //     $('#answer-modal').modal('hide');
        //     $.pjax.reload({
        //         container:"#comment-list",
        //         pushState: false,
        //         replaceState: false,
        //         timeout: 5000,
        //     })
        // });

        $('#comment-pjax-container').on('click', '.btn-comment', function(e) {
            e.preventDefault();
            $('#form-comment').attr('action', $(this).attr('href'));
            // console.log($(this).attr('href'));
            // console.log($(this).parent());
            $('#comment-text').val('');
            // const copy = $('#answer-comment').clone();
            $(this).parent().parent().parent().append($('#answer-comment'));
            if ($('#answer-comment').hasClass('d-none')) {
            // if (copy.hasClass('d-none')) {
                // console.log(13);
                $('#answer-comment').removeClass('d-none');
                // copy.removeClass('d-none');
                $('.btn-close').removeClass('d-none');
            } 

            // else {
            //     $('#answer-comment').addClass('d-none');
            // }
        });

        $('.btn-close').on('click', function(e) {
            e.preventDefault();
            $('#comment-text').val('');
                // console.log(13);
            $('#answer-comment').addClass('d-none');
            $('.btn-close').addClass('d-none');

            // else {
            //     $('#answer-comment').addClass('d-none');
            // }
        })
    }
)