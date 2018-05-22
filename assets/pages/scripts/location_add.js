var GoogleMap = function () {
    var marker;
    var lat, lot;
    var GoogleMapInit = function()
    {

        var map = new GMaps({
            el: '#disp_map',
            lat: "30.3753",
            lng: "69.3451"
        });

        map.setZoom(8);

        var handleAction = function () {
            var text = $.trim($('#txtAddressInput').val());
            GMaps.geocode({
                address: text,
                callback: function (results, status) {
                    if (status == 'OK') {
                        var latlng = results[0].geometry.location;
                        map.setCenter(latlng.lat(), latlng.lng());
                        if(marker !== undefined)
                        {
                            marker.setMap(null);
                        }
                        lat = latlng.lat();
                        lot = latlng.lng();

                        marker = map.addMarker({
                            lat: lat,
                            lng: lot,
                            title: 'Location to be added',
                            infoWindow: {
                                content: "<b>"+text+"</b>"
                            }
                        });
                        marker.show;

                        App.scrollTo($('#disp_map'));
                    }
                    else
                    {
                        App.alert({ container: '#alertContainer', // alerts parent container
                            place: 'append',
                            type: 'info',
                            message: 'Address is invalid.',
                            close: true,
                            reset: false,
                            focus: true,
                            icon: 'fa fa-check'
                        });

                    }
                }
            });
        }

        $('#btSearchButton').click(function (e) {
            e.preventDefault();
            handleAction();
        });

        $("#txtAddressInput").keypress(function (e) {
            var keycode = (e.keyCode ? e.keyCode : e.which);
            if (keycode == '13') {
                e.preventDefault();
                handleAction();
            }
        });
    };

    var UploadHandler = function()
    {
        $('#formAddress').on('submit', function(e){
            e.preventDefault();
            if(marker === undefined)
            {
                App.alert({ container: '#alertContainer', // alerts parent container
                    place: 'append',
                    type: 'info',
                    message: 'Address is invalid.',
                    close: true,
                    reset: false,
                    focus: true,
                    icon: 'fa fa-check'
                });
                return;
            }
            //do ajax here with location.


        });

    };

    return {
        //main function to initiate the module
        init: function () {
            GoogleMapInit();
            UploadHandler();
        }
    };
}();

jQuery(document).ready(function() {
    GoogleMap.init();
});