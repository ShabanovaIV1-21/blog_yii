$(
    () => {
        $('.post-form').on('change', '#post-check', function(){
            $('#post-theme_id option:first').prop('selected', true);
            if ($(this).prop('checked')) {
                $('#post-theme').prop('disabled', false);
                $('#post-theme_id').removeClass('is-invalid');
                $('#post-theme').removeClass('is-valid');
                $('#form-post').yiiActiveForm('add',{"id":"post-theme","name":"theme","container":".field-post-theme","input":"#post-theme","error":".invalid-feedback","validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Необходимо заполнить «Своя тема»."});yii.validation.string(value, messages, {"message":"Значение «Своя тема» должно быть строкой.","max":255,"tooLong":"Значение «Своя тема» должно содержать максимум 255 символа.","skipOnEmpty":1});}})
                $('#form-post').yiiActiveForm('remove', 'post-theme_id');
            } else {
                $('#post-theme').prop('value', '');
                $('#post-theme').prop('disabled', true);
                $('#post-theme_id').removeClass('is-valid');
                $('#post-theme').removeClass('is-invalid');
                $('#form-post').yiiActiveForm('add',{"id":"post-theme_id","name":"theme_id","container":".field-post-theme_id","input":"#post-theme_id","error":".invalid-feedback","validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Необходимо заполнить «Тема поста»."});yii.validation.number(value, messages, {"pattern":/^[+-]?\d+$/,"message":"Значение «Тема поста» должно быть целым числом.","skipOnEmpty":1});yii.validation.required(value, messages, {"message":"Необходимо заполнить «Тема поста»."});}});
                $('#form-post').yiiActiveForm('remove', 'post-theme');
            }
        })
    }
)





    
    