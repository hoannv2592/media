// initialize validation messages variable
$.validation = {
    messages: {}
};

// add validation templates to show fancy icons with message text
$.extend($.validation.messages, {
    required: '<i class="fa fa-exclamation-circle"></i> Hãy nhập.',
    email: '<i class="fa fa-exclamation-circle"></i> Nhập đúng định dạng email.',
    number: '<i class="fa fa-exclamation-circle"></i> Nhập số.',
});

// call our 'validateLoginForm' function when page is ready
$(document).ready(function () {
    validateLoginForm();
});

// bind jQuery validation event and form 'submit' event
var validateLoginForm = function () {
    var modal_login = $('#modal_login');
    var modal_form_login = $('#modal_form_login');

    // bind jQuery validation event
    modal_form_login.validate({
        rules: {
            email: {
                required: true,     // email field is required
                email: true         // validate email address
            },
            name: {required: true},
            phone: {
                required: true,
                number: true
            },
            birthday: {required: true}
        },
        messages: {
            email: {
                required: $.validation.messages.required,
                email: $.validation.messages.email
            },
            name: {
                required: $.validation.messages.required,
            },
            phone: {
                required: $.validation.messages.required,
                number: $.validation.messages.number
            },
            birthday: {required: $.validation.messages.required}
        },
        errorPlacement: function (error, element) {
            // insert error message after invalid element
            error.insertAfter(element);
            // hide error message on window resize event
            $(window).resize(function () {
                error.remove();
            });
        },
        invalidHandler: function (event, validator) {
            var errors = validator.numberOfInvalids();
            if (errors) {} else {}
        }
    });

    // bind form submit event
    modal_form_login.on('submit', function (e) {
        // if form is valid then call AJAX script
        if (modal_form_login.valid()) {
            var ajaxRequest = $.ajax({
                url: '/Devices/add_log_partner',
                type: "POST",
                data:modal_form_login.serialize(),
                beforeSend: function () {
                }
            });
            ajaxRequest.fail(function (data, status, errorThrown) {
                // error
                // var $message = data.responseText;
                // login_result.html('<div class="alert alert-danger">' + $message + '</div>');
                modal_login.modal('hide');
            });

            ajaxRequest.done(function (response) {
                // done
                // var $response = $.parseJSON(response);
                // login_result.html('<div class="alert alert-success">' + $response.message + '</div>');
                modal_login.modal('hide');
                return doLogin();
            });
        }

        // stop default submit event of form
        e.preventDefault();
        e.stopPropagation();
    });

    modal_login.on('hide.bs.modal', function (e) {
        // reset form fields and validation errors
        modal_form_login.validate().resetForm();
        modal_form_login.trigger('reset');
    });
};

jQuery(document).ready(function ($) {
    'use strict';
    // CENTERED MODALS
    // phase one - store every dialog's height
    $('.modal').each(function () {
        var t = $(this),
            d = t.find('.modal-dialog'),
            fadeClass = (t.is('.fade') ? 'fade' : '');
        // render dialog
        t.removeClass('fade')
            .addClass('invisible')
            .css('display', 'block');
        // read and store dialog height
        d.data('height', d.height());
        // hide dialog again
        t.css('display', '')
            .removeClass('invisible')
            .addClass(fadeClass);
    });
    // phase two - set margin-top on every dialog show
    $('.modal').on('show.bs.modal', function () {
        var t = $(this),
            d = t.find('.modal-dialog'),
            dh = d.data('height'),
            w = $(window).width(),
            h = $(window).height();
        d.css('margin-top', Math.round(0.96 * (h - dh) / 2));
    });

});