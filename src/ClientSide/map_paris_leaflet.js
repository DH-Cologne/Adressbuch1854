// Map mit Leaflet

	var map;
	var allPins = new Array;
	
	function fetchJson(){
		
		return json;
	}

	function getID(currentplace) {
		var id = currentplace["@ID"];
		return id;
	}

	function getName(currentplace) {
		var name = currentplace.Name;
		return name;
	}

	function getCoords(currentplace) {
		var array = new Array;
		var lat = currentplace.coords["lat"];
		var lng = currentplace.coords["long"];
		array.push(Number(lat));
		array.push(6112-Number(lng));
		return array;
	}
	
	function initialzeMarkers(){
		
		// fetch Json file with the data to be displayed on the map
		var json = fetchJson();
		
		//foreach(Personen/Company in der Json-Datei){
			//var long = 
			//var lat = Finde die Koordinaten des Datensatzes
			// Dabei: if(address has coords), nimm die, sonst nimm die coords der street
			
			// für jeden Datensatz nimm ein paar Infos als Title für den Pin
			
			// erstelle für den Datensatz einen Pin und setze ihn auf die Map
			
			
		//} Vergleiche getPlace(map)
	}
	
	function getPlace(map){
		for ( var i = 0;i < eventsJson.length; i++){
			var currentevent = eventsJson[i];
			var currentplaceID = currentevent.EreignisOrt;
			var currentplace = getObjectByID(placesJson, currentplaceID);
			if(currentplace["@Marker"]=="punkt"){
				var mapPin =  L.marker(L.latLng(getCoords(currentplace)), {id: getID(currentevent), title: getName(currentplace)});
			}
			else {
				var mapPin = L.circle(L.latLng(getCoords(currentplace)), {id: getID(currentevent), title: getName(currentplace), radius:70, color:'#0099FF'});
			}
			allPins.push(mapPin);
			mapPin.addTo(map);
			mapPin.bindPopup('<span style ="font-size:16pt;text-shadow:none">'+getName(currentplace)+'</span>');
			mapPin.on('click', clickZoom);
		}
	}
	
	
	function initializeMap() {
		
		map = L.map('map', {crs: L.CRS.Simple, draggable: false, zoomControl: true, maxZoom: 2, minZoom: -3,});
		var bounds= [[0,0], [6112, 5376]];
		var img = L.imageOverlay('../imgs/karte.jpg', bounds).addTo(map);
		map.fitBounds(bounds);
		getPlace(map);
	}
	
	function clickZoom(e) {
		map.setView(e.target.getLatLng(),0);
		
		synchronizeData('map', e.target.options.id);
	}

	function setMap(eventID){
		var eventmarker;
		for(var i = 0; i<allPins.length; i++){
			var currentpin = allPins[i];
			if(currentpin.options.id == eventID){
				eventmarker=currentpin;
			break;
			}
		}
		eventmarker.openPopup();
		map.setView(eventmarker.getLatLng(),0);
	

}