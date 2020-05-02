jQuery(document).ready(function () {
    $('form').each(function(){
        $(this).validate({
            ignore: '.novalidate',
            rules: {
                userName: "required",
                taskText: "required",
                userEmail: {
                    required: true,
                    email: true
                }
            },
            errorPlacement: function(error, element) {
                var lastError = $(element).data('lastError'),
                    newError = $(error).text();
                $(element).data('lastError', newError);
                if (newError !== '') {
                    $(element).tooltip({
                        placement: "top",
                        trigger: "manual"
                    }).attr('data-original-title', newError).tooltip('show');
                }
            },
            success: function(label, element) {
                $(element).tooltip('hide');
            }
        });
        $.extend($.validator.messages, {
            required: "Заполните это поле",
            email: "Введите корректный E-mail"
        });
    });
});