var TableDatatablesButtons = function () {

    var initTable1 = function () {
        var table = $('#tbLocationList');

        var oTable = table.dataTable({

            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
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
            "columnDefs": [
                {  // set default column settings
                    searchable:false,
                    'orderable': false,
                    'targets': [0]
                },
                {  // set default column settings
                    searchable:false,
                    'orderable': false,
                    'targets': [3]
                }],

            buttons: [
                { extend: 'print', className: 'btn dark btn-outline' },
                { extend: 'pdf', className: 'btn green btn-outline' },
                { extend: 'csv', className: 'btn purple btn-outline ' },
            ],

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
            "pageLength": 5,

            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
        });

        table.on('click', '.btn-circle', function (e) {
            e.preventDefault();

            App.blockUI({
                target:'#formInfo',
                animate:true
            });

            requestRemove = $.ajax({
                url:"./getlocation/" + $(this).attr('data-value'),
                type: "POST",
                cache:false
            });

            requestRemove.done(function(msg) {
                App.unblockUI($('#formInfo'));
                var locationDetail = JSON.parse(msg);
                console.log(locationDetail);
                $('#locationId').val(locationDetail.ID);
                $('#locationName').val(locationDetail.LOCATION_NAME);
                $('#locationAddress').val(locationDetail.ADDRESS);
                $('#locationDescription').val(locationDetail.DESCRIPTION);

                if(locationDetail.TYPE === 0)
                {
                    $('#groupOption1').prop('checked', true);
                }
                else if(locationDetail.TYPE === 1)
                {
                    $('#groupOption2').prop('checked', true);
                }
                else {
                    $('#groupOption3').prop('checked', true);
                }
            });

            requestRemove.fail(function(jqXHR, textStatus) {
                App.unblockUI($('#formInfo'));
            });
        });


    };
    return {
        //main function to initiate the module
        init: function () {
            if (!jQuery().dataTable) {
                return;
            }
            initTable1();
        }
    };
}();

jQuery(document).ready(function() {
    TableDatatablesButtons.init();
});