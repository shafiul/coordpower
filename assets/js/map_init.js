function map_init() {
	var styles = [
	  {
		featureType: "all",
		elementType: "labels",
		stylers: [
		  { visibility: "off" }
		]
	  }
	];

    var myOptions = {
      zoom: 7,
      center: new google.maps.LatLng(23.7, 90.375),
      mapTypeId: google.maps.MapTypeId.TERRAIN,
	  styles: styles
    };
 
    var map = new google.maps.Map(document.getElementById("map_canvas"),
        myOptions);
        
	var populationOptions = {
	strokeColor: '#FF0000',
	strokeOpacity: 0.8,
	strokeWeight: 2,
	fillColor: '#FF0000',
	fillOpacity: 0.35,
	map: map,
	radius: 1000
	};
	
	var col = ["#FF0000", "#0F0", "#00F", "#FF0" ];
	var cid = 0;
	var chid = 0;
	
	var infowindow = new google.maps.InfoWindow();

	var len = pts.length;
	for(var i = 0; i < len; i += 3) {
		var name = pts[i][0];
		var lat = pts[i][1];
		var lng = pts[i][2];
		populationOptions['center'] = new google.maps.LatLng(lng, lat);
		populationOptions['strokeColor'] = col[cid];
		populationOptions['fillColor'] = col[cid];
		chid++;
		if(chid == 50) {
			cid++; if(cid == col.length) cid = 0;
			chid = 0;
		}
		var unionCircle = new google.maps.Circle(populationOptions);

		with ({ name: name, pos: populationOptions['center'] }) {
			google.maps.event.addListener(unionCircle, 'click', function() {
				infowindow.setContent(name + " Upzilla");
				infowindow.setPosition(pos);
				infowindow.open(map);
			});
        }
	}

	

	
}

$(document).ready(function(){
    map_init();    
})

