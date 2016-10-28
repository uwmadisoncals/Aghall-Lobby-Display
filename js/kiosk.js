
//var API_BASE = 'http://livemap.msn-transit-api.appspot.com';
var API_BASE = 'http://api.smsmybus.com';

var metro_direction = [];
var metro_location = [];

function update(stopID, direction, key) {
    metro_direction[stopID] = direction;
    refreshTimes(stopID,direction, key);
}

function refreshTimes(stopID, Direction, key) {
    var url = API_BASE + '/v1/getarrivals';//'http://api.smsmybus.com/v1/getarrivals';
    $.ajax({
      type: "GET",
      url: url,
      data: {'key':key,'stopID':stopID},
      dataType: 'jsonp',
      success: arrivalsCallback,
    }); // .ajax
} // refreshTimes

function getLocation(stopID,key) {
    var url = API_BASE + '/v1/getstoplocation';//'http://api.smsmybus.com/v1/getstoplocation';
    $.ajax({
      type: "GET",
      url: url,
      data: {'key':key,'stopID':stopID},
      dataType: 'jsonp',
      success: locationCallback,
    }); // .ajax
}

function locationCallback(jsondata) {
    if( jsondata.status == "0") {
        stopID = jsondata.stopID;
        metro_location[stopID] = jsondata.intersection;
    }
}

function arrivalsCallback(jsondata) {
    if( jsondata.status == "-1") {
        $("#"+stopID+"-estimates").replaceWith('<p id="'+stopID+'-estimates" style="font-weight: bold">Error retrieving data!</p>');
    } else {
        stopID = jsondata.stop.stopID;
      	timestamp = jsondata.timestamp;
        $("#"+stopID+"-estimates").replaceWith('<div id="'+stopID+'-estimates" class="estimates"><div class="title"><span class="direction">'+metro_direction[stopID]+'</span> buses:</div>');
        if(!metro_location[stopID]) {
				        metro_location[stopID] = "The bus stops outside";
        }
        $("#busStopID").replaceWith('<div id="busStopID"><span id="location">' + metro_location[stopID] + '</span> @ <span class="estimate">' + timestamp + 'ish</span></div>');

        var routes = jsondata.stop.route;
        for( var i=0; i < routes.length; i++ ) {
          	var routeID = routes[i].routeID;
          	var minutes = routes[i].minutes;
      	    if (i>3) {
                // limit number of rows
                $("#"+stopID+"-estimates").append('<span class="arrival"> ... and a #'+routeID+' in '+minutes+' min </span>');
                return true;
            }
          	var destination = routes[i].destination;
          	destination = destination.substring(0,18); //limit the length in case of long ones (unknown risk)
          	if (minutes<5) {
                time = '<div class="arrival"><span class="coming-soon">#<span class="route-label">'+routeID+'</span> to <span class="destination-abbrev">'+destination+'</span> in <span class="minutes">'+minutes+'</span> min</span></div>';
      	    } else {
                time = '<div class="arrival">#<span class="route-label">'+routeID+'</span> to <span class="destination-text">'+destination+'</span> in <span class="minutes">'+minutes+'</span> min</span></div>';
            }
      	    $("#"+stopID+"-estimates").append(time);
        };
    }
} // success function
