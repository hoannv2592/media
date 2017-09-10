$(function () {
    $('#form_validation').validate({
        rules: {
            'checkbox': {
                required: true
            },
            'name': {
                remote: {  // value of 'username' field is sent by default
                    type: 'POST',
                    async: false,
                    url: '/Landingpages/isNameExist',
                    data: {
                        backup_name: function () {
                            return $('#landingpage').val();
                        }
                    }
                }
            },
            'email' : {
                remote: {
                    type: 'POST',
                    async: false,
                    url: '/Users/isNameExist',
                    onkeyup: false
                }
            }
        },
        onkeyup: function(element, event) {
            if ($(element).attr('name') === "name") {
                return false; // disable onkeyup for your element named as "name"
            }
            else if ($(element).attr('email') === "email") {
                return false;
            }
            else { // else use the default on everything else
                if ( event.which === 9 && this.elementValue( element ) === "" ) {
                    return;
                } else if ( element.name in this.submitted || element === this.lastElement ) {
                    this.element( element );
                }
            }
        },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
    });

    $('#form_validation_ad').validate({
        rules: {
            'checkbox': {
                required: true
            },
            'gender': {
                required: true
            },
            'name': {
                remote: {  // value of 'username' field is sent by default
                    type: 'POST',
                    async: false,
                    url: '/Adgroups/isNameExist',
                    data: {
                        backup_name: function () {
                            return $('#landingpage').val();
                        }
                    }
                }
            }
        },
        onkeyup: function(element, event) {
            if ($(element).attr('name') === "name") {
                return false; // disable onkeyup for your element named as "name"
            } else { // else use the default on everything else
                if ( event.which === 9 && this.elementValue( element ) === "" ) {
                    return;
                } else if ( element.name in this.submitted || element === this.lastElement ) {
                    this.element( element );
                }
            }
        },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
    });

    $('#form_validation_se').validate({
        rules: {
            'name': {
                remote: {  // value of 'username' field is sent by default
                    type: 'POST',
                    async: false,
                    url: '/ServiceGroups/isNameExist',
                    data: {
                        backup_name: function () {
                            return $('#landingpage').val();
                        }
                    }
                }
            }
        },
        onkeyup: function(element, event) {
            if ($(element).attr('name') === "name") {
                return false; // disable onkeyup for your element named as "name"
            } else { // else use the default on everything else
                if ( event.which === 9 && this.elementValue( element ) === "" ) {
                    return;
                } else if ( element.name in this.submitted || element === this.lastElement ) {
                    this.element( element );
                }
            }
        },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
    });

    $('#form_validation_ca').validate({
        rules: {
            'name': {
                remote: {  // value of 'username' field is sent by default
                    type: 'POST',
                    async: false,
                    url: '/CampaignGroups/isNameExist',
                    data: {
                        backup_name: function () {
                            return $('#landingpage').val();
                        }
                    }
                }
            }
        },
        onkeyup: function(element, event) {
            if ($(element).attr('name') === "name") {
                return false; // disable onkeyup for your element named as "name"
            } else { // else use the default on everything else
                if ( event.which === 9 && this.elementValue( element ) === "" ) {
                    return;
                } else if ( element.name in this.submitted || element === this.lastElement ) {
                    this.element( element );
                }
            }
        },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
    });

    // $('#form_validation_apt').validate({
    //     rules: {
    //         'name': {
    //             remote: {  // value of 'username' field is sent by default
    //                 type: 'POST',
    //                 async: false,
    //                 url: '/Devices/isNameExist',
    //                 data: {
    //                     backup_name: function () {
    //                         return $('#id').val();
    //                     }
    //                 }
    //             }
    //         }
    //     },
    //     onkeyup: function(element, event) {
    //         if ($(element).attr('name') === "name") {
    //             return false; // disable onkeyup for your element named as "name"
    //         } else { // else use the default on everything else
    //             if ( event.which === 9 && this.elementValue( element ) === "" ) {
    //                 return;
    //             } else if ( element.name in this.submitted || element === this.lastElement ) {
    //                 this.element( element );
    //             }
    //         }
    //     },
    //     highlight: function (input) {
    //         $(input).parents('.form-line').addClass('error');
    //     },
    //     unhighlight: function (input) {
    //         $(input).parents('.form-line').removeClass('error');
    //     },
    //     errorPlacement: function (error, element) {
    //         $(element).parents('.form-group').append(error);
    //     }
    // });

    //Advanced Form Validation
    // $('#form_advanced_validation').validate({
    //     rules: {
    //         'date': {
    //             customdate: true
    //         },
    //         'phone': {
    //             number : true
    //         }
    //     },
    //     highlight: function (input) {
    //         $(input).parents('.form-line').addClass('error');
    //     },
    //     unhighlight: function (input) {
    //         $(input).parents('.form-line').removeClass('error');
    //     },
    //     errorPlacement: function (error, element) {
    //         $(element).parents('.form-group').append(error);
    //     }
    // });

    //Custom Validations ===============================================================================
    //Date
    $.validator.addMethod('customdate', function (value, element) {
            return value.match(/^\d\d\d\d?-\d\d?-\d\d$/);
        },
        'Please enter a date in the format YYYY-MM-DD.'
    );

    //Credit card
    $.validator.addMethod('creditcard', function (value, element) {
            return value.match(/^\d\d\d\d?-\d\d\d\d?-\d\d\d\d?-\d\d\d\d$/);
        },
        'Please enter a credit card in the format XXXX-XXXX-XXXX-XXXX.'
    );
    //==================================================================================================
});