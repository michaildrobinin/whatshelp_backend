/**
 * Created by rock on 7/11/2017.
 */
var BootstrapSwitchHandler = function () {

    var initSwitch = function() {

        $('.activeSwitch').on('switch-change', function (event, state) {
            $('.activeSwitch').bootstrapSwitch('toggleRadioState');
            console.log("asdf00");
        });
    }


    var initDialogOpen = function() {
        $('#confirm').on('show.bs.modal', function(e){
            var modalDlg = $(this);
            var clickedButton = (e.relatedTarget);
            if(clickedButton == 'undefined')
                return;
            var selectionId = $(clickedButton).data('value');
            $('#deleteConfirmButton').on('click', function(){
               modalDlg.modal('hide');
               var removeRequest = $.ajax({
                    cache: false,
                    type: 'POST',
                    url: './removeTour',
                    data: {
                        'id':selectionId
                    }
                });
               removeRequest.done(function(msg){
                   console.log(msg);
                   window.location.href = "tourlist";
               });

               removeRequest.fail(function(err, status)
               {
                   window.location.href = "tourlist";
               });
            });
        })
    }
    return {
        //main function to initiate the module
        init: function () {
            initSwitch();
            initDialogOpen();
        }
    };
}();


jQuery(document).ready(function() {
    BootstrapSwitchHandler.init();
});

function onClickRemove(){
    console.log('onclickRemove');
}

