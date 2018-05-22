var map;
var Dashboard = function() {

    var GoogleMapInit = function()
    {
        map = new GMaps({
            el: '#dashboard_map',
            lat: "30.3753",
            lng: "69.3451"
        });
        map.setZoom(8);

        //get all marker position first
        //draw all marker on map
        var requestGetMarker = $.ajax({
            url: "./dash/GetWholeLocationPoints",
            type: "POST",
            data:{},
            cache: false
        });
        requestGetMarker.done(function(msg) {
            var posArr = JSON.parse(msg);
            console.log(posArr);
            if(posArr.length < 1) {
                return;
            }



            var markers = [];//some array
            for(var i=0; i<posArr.length; i++)
            {
                var tmp_marker;
                if(parseInt(posArr[i].TYPE) === 0)
                {
                    //shop
                    tmp_marker = map.addMarker({
                        lat: posArr[i].LOCATION_LAT,
                        lng: posArr[i].LOCATION_LOT,
                        title: posArr[i].LOCATION_NAME,
                        icon: '../assets/global/img/shop_marker.png',
                        infoWindow: {
                            name: posArr[i].ADDRESS,
                            content: posArr[i].LOCATION_NAME + "<br><b>"+posArr[i].DESCRIPTION+"</b>)"
                        }
                    });

                }
                else if(parseInt(posArr[i].TYPE)     === 1)
                {
                    //group
                    tmp_marker = map.addMarker({
                        lat: posArr[i].LOCATION_LAT,
                        lng: posArr[i].LOCATION_LOT,
                        title: posArr[i].LOCATION_NAME,
                        icon: '../assets/global/img/group_marker.png',
                        infoWindow: {
                            name: posArr[i].ADDRESS,
                            content: posArr[i].LOCATION_NAME + "<br><b>"+posArr[i].DESCRIPTION+"</b>)"
                        }
                    });

                }
                else
                {
                    //other
                    tmp_marker = map.addMarker({
                        lat: posArr[i].LOCATION_LAT,
                        lng: posArr[i].LOCATION_LOT,
                        title: posArr[i].LOCATION_NAME,
                        icon: '../assets/global/img/other_marker.png',
                        infoWindow: {
                            name: posArr[i].ADDRESS,
                            content: posArr[i].LOCATION_NAME + "<br><b>"+posArr[i].DESCRIPTION+"</b>)"
                        }
                    });

                }

                tmp_marker.show
                markers.push(tmp_marker);
            }


            var bounds = new google.maps.LatLngBounds();
            for (var i = 0; i < markers.length; i++) {
                bounds.extend(markers[i].getPosition());
            }
            map.fitBounds(bounds);
        });

        requestGetMarker.fail(function(jqXHR, textStatus) {
            console.log(textStatus);
        });

    };

    return {
        init: function() {
            GoogleMapInit();
        }
    };

}();

if (App.isAngularJsApp() === false) { 
    jQuery(document).ready(function() {
        Dashboard.init(); // init metronic core componets
    });
}