var AdminEditManager = function () {

    var initPasswordReset = function (e) {
        $('#btChangePassword').on('click', function (evt) {
            evt.preventDefault();

            if (!$('#formPassword').validate().form()) {
                return;
            }

            var newPass = $('#adminPassword').val();
            var reTypePass = $('#adminConfirmPassword').val();
            if(newPass === reTypePass) {
                App.blockUI({
                    target:'#formPassword',
                    animate:true
                });
                var requestRemove = $.ajax({
                    url: ".././user/adminpassword",
                    type: "POST",
                    data:{
                      'adminPassword':newPass, 'adminConfirmPassword': reTypePass
                    },
                    cache: false
                });
                requestRemove.done(function(msg) {
                    App.unblockUI('#formPassword');
                    if(msg === '0')
                    {
                        App.alert({ container: '#alertContainer', // alerts parent container
                            place: 'append',
                            type: 'error',
                            message: 'password doesn\'t match',
                            close: true,
                            reset: false,
                            focus: true,
                            icon: 'fa fa-check'
                        });
                        return;
                    }

                    App.alert({ container: '#alertContainer', // alerts parent container
                        place: 'append',
                        type: 'info',
                        message: 'Success to change password',
                        close: true,
                        reset: false,
                        focus: true,
                        icon: 'fa fa-check'
                    });
                    $('#adminPassword').val("");
                    $('#adminConfirmPassword').val("");
                });

                requestRemove.fail(function(jqXHR, textStatus) {
                    App.unblockUI('#formPassword');
                    App.alert({ container: '#alertContainer', // alerts parent container
                        place: 'append',
                        type: 'error',
                        message: 'Change password is failed',
                        close: true,
                        reset: false,
                        focus: true,
                        icon: 'fa fa-check'
                    });
                });
            }
            else
            {
                App.alert({ container: '#alertContainer', // alerts parent container
                    place: 'append',
                    type: 'warning',
                    message: 'Password doesn\'t match',
                    close: true,
                    reset: false,
                    focus: true,
                    icon: 'fa fa-check'
                    });

            }
        })
    };



    return {
        //main function to initiate the module
        init: function () {
            initPasswordReset();
        }
    };
}();

jQuery(document).ready(function() {
    AdminEditManager.init();

});