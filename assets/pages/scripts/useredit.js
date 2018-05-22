var UserEditManager = function () {

    var initPasswordReset = function (e) {
        var table = $('#tbContact');

        var oTable = table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "_MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "columnDefs": [{  // set default column settings
                searchable:false,
                'orderable': false,
                'targets': [0]
            }],
            buttons:[],
            // setup responsive extension: http://datatables.net/extensions/responsive/
            responsive: true,

            "order": [
                [0, 'asc']
            ],

            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 10,

            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
        });


        $('#btChange').on('click', function (evt) {
            evt.preventDefault();

            if (!$('#formPassword').validate().form()) {
                return;
            }

            var newPass = $('#txtPassword').val();
            var reTypePass = $('#txtNewPassword').val();
            if(newPass === reTypePass)
            {
                App.blockUI({
                    target:'#formPassword',
                    animate:true
                });
                var requestRemove = $.ajax({
                    url: "../upasschange/" + $(this).attr('data-value'),
                    type: "POST",
                    data:{
                      'newPass':newPass, 'reTypePass': reTypePass
                    },
                    cache: false
                });
                requestRemove.done(function(msg) {
                    App.unblockUI('#formPassword');
                    // console.log(msg);
                    App.alert({ container: '#alertContainer', // alerts parent container
                        place: 'append',
                        type: 'info',
                        message: msg,
                        close: true,
                        reset: false,
                        focus: true,
                        icon: 'fa fa-check'
                    });
                    $('#txtPassword').val("");
                    $('#txtNewPassword').val("");
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

    var initApproveReset = function(e){
      $('#submitApprove').on('click', function(evt){
         evt.preventDefault();
          App.blockUI({
              target:'#approveForm',
              animate:true
          });

          if ($("input[name='approveOption']:checked").length > 0){
            var radio_button_value = $('input:radio[name=approveOption]:checked').val();
          }
          else{
              App.alert({ container: '#alertContainer1', // alerts parent container
                  place: 'append',
                  type: 'warning',
                  message: 'No status is selected. Try again.',
                  close: true,
                  reset: false,
                  focus: true,
                  icon: 'fa fa-check'
              });
              return false;
          }

          var requestApprove = $.ajax({
              url: "../ustatuschange/" + $(this).attr('data-value'),
              type: "POST",
              data:{
                  'approve':radio_button_value
              },
              cache: false
          });

          requestApprove.done(function(msg){
              App.unblockUI('#approveForm');
              App.alert({ container: '#alertContainer1', // alerts parent container
                  place: 'append',
                  type: 'info',
                  message: 'Successfully changed status.',
                  close: true,
                  reset: false,
                  focus: true,
                  icon: 'fa fa-check'
              });
          });

          requestApprove.fail(function(jqXHR, textStatus){
              App.unblockUI('#approveForm');
              App.alert({ container: '#alertContainer1', // alerts parent container
                  place: 'append',
                  type: 'error',
                  message: 'Failed to change status. Try again',
                  close: true,
                  reset: false,
                  focus: true,
                  icon: 'fa fa-check'
              });
          });
      });
    };

    var initApproveTourism = function(e){
        $('#submitTour').on('click', function(evt){
            evt.preventDefault();
            App.blockUI({
                target:'#tourismForm',
                animate:true
            });
            var vals = [];
            $(".md-check:checked").each(function(){
                        vals.push($(this).val());
                    });
            var $submitTrip = $.ajax({
                    url:'../utourtarget/' +  $('#submitTour').attr('data-value'),
                    type:'POST',
                    data:{
                        'chooseTarget':JSON.stringify(vals)
                    }
                }
            );
            $submitTrip.done(function (msg) {
                App.unblockUI('#tourismForm');
                location.reload(true);
            });
            $submitTrip.fail(function (evt, err) {
                App.unblockUI('#tourismForm');
                App.alert({ container: '#alertTrip', // alerts parent container
                    place: 'append',
                    type: 'danger',
                    message: 'Failed to change tourism. Try again',
                    close: true,
                    reset: false,
                    focus: true,
                    icon: 'fa fa-check'
                });
            });
        });
    };

    return {
        //main function to initiate the module
        init: function () {
            initPasswordReset();
            initApproveReset();
            initApproveTourism();
        }
    };
}();

jQuery(document).ready(function() {
    UserEditManager.init();

});