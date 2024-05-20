// Important global variables
var leafletMap = null;
var osm = null;
var markers = null;

$("document").on("mapBox2", function() {
    leafletMap.invalidateSize(false);
});

$("document").ready(function () {
    initializeMap();
    initializeMarkercluster();
    initializeMarkers();
});

/**
 * Initial function. The leaflet map is created, options are set
 * and a legend is created.
 */

function initializeMap() {
    leafletMap = L.map("mapBox2", {
        center: [48.859289, 2.342122],
        maxBounds: [
            [48.813141, 2.234129],
            [48.908715, 2.422941],
        ],
        scrollWheelZoom: true,
        transparent: true,
        zoom: 12,
        minZoom:12,
    });

    L.tileLayer("http://{s}.tile.openstreetmap.de/{z}/{x}/{y}.png", {
        attribution: '&copy; <a target="blank" href="https://www.openstreetmap.de">OpenStreetMap</a>',
        subdomains: ["a", "b", "c"],
    }).addTo(leafletMap);


    //The historic map is created with data from IGN https://www.geoportail.gouv.fr/donnees/carte-de-letat-major-1820-1866

    var cartohisto = L.tileLayer(
        "https://wxs.ign.fr/cartes/geoportail/wmts?" +
            "&REQUEST=GetTile&SERVICE=WMTS&VERSION=1.0.0" +
            "&STYLE=normal" +
            "&TILEMATRIXSET=PM" +
            "&FORMAT=image/jpeg" +
            "&LAYER=GEOGRAPHICALGRIDSYSTEMS.ETATMAJOR40" +
            "&TILEMATRIX={z}" +
            "&TILEROW={y}" +
            "&TILECOL={x}",
        {
            Zoom: 12,
            maxZoom: 16,
            attribution: '<a target="blank" href="https://www.geoportail.gouv.fr/donnees/carte-de-letat-major-1820-1866">IGN-F/Geoportail</a>',
            tileSize: 256,
            transparent: true,
        }
    ).addTo(leafletMap);


        //Use via Leaflet plugin Opacity Controls https://github.com/lizardtechblog/Leaflet.OpacityControls

    var opacitySlider = new L.Control.opacitySlider({ position: "bottomright" });
    leafletMap.addControl(opacitySlider);
    var lowerOpacity = new L.Control.lowerOpacity({ position: "bottomright" });
    leafletMap.addControl(lowerOpacity);
    var higherOpacity = new L.Control.higherOpacity({ position: "bottomright" });
    leafletMap.addControl(higherOpacity);

    higherOpacity.setOpacityLayer(cartohisto);

    //Use via Leaflet Shapefile plugin https://github.com/calvinmetcalf/leaflet.shapefile
    //Shapefile map is created with data from ALPAGE project https://alpage.huma-num.fr/

    var shapefile = new L.Shapefile("/webroot/download/Export_arrondissements.zip", 
        { attribution: "<a target='blank' href='https://alpage.huma-num.fr/'>Projet ALPAGE</a>" ,
          onEachFeature: function(feature, layer) {
      layer.bindTooltip("Arrondissement: " + feature.properties.NUM_ARROND + "");
     
    },
    style: function(feature) {
      return { color: "black" };
    }});

    shapefile.addTo(leafletMap);
    shapefile.once("data:loaded", function () {
        console.log("finished shapefile loaded");
    });

    //Use via Paris OpenData https://opendata.paris.fr/explore/dataset/arrondissements/map/?disjunctive.c_ar&disjunctive.c_arinsee&disjunctive.l_ar&basemap=jawg.dark&location=12,48.85889,2.34692

    var arrondissement2 = new L.Shapefile('/webroot/download/arrondissements.zip',
                                        {attribution:'<a target="blank" href="https://opendata.paris.fr/explore/dataset/arrondissements/map/?disjunctive.c_ar&disjunctive.c_arinsee&disjunctive.l_ar&basemap=jawg.dark&location=12,48.85889,2.34692">Paris Open Data</a>',
                                        onEachFeature:function(feature, layer)
                                                    {
                                                        layer.bindTooltip('Arrondissement: '
                                                                           +feature. properties.c_ar+'');
                                                       
                                                    }}
                                        );

    arrondissement2.addTo(leafletMap);
    arrondissement2.once("data:loaded", function(){
        console.log("finished shapefile loaded");
    });

 //Shapefile map is created with data from ALPAGE project https://alpage.huma-num.fr/

    var quartiers = new L.Shapefile('/webroot/download/Export_Quartiers__Vasserot_.zip',
                                        {
                                        onEachFeature:function(feature, layer)
                                                    {
                                                        layer.bindTooltip('Viertel: '
                                                                           +feature. properties.NOM+'');
                                            
                                                    },
    style: function(feature) {
      return { color: "green" };
    }}
                                        );

    quartiers.addTo(leafletMap);
    quartiers.once("data:loaded", function(){
        console.log("finished shapefile loaded");
    });

    //Baselayers is created to switch between the two maps

    var controlMap = { "Open Street Map": leafletMap, " Karte Etat Major 1820-1866": cartohisto };
    var otherLayers = {"Arrondissements vor 1860" : shapefile, "Arrondissements nach 1860" : arrondissement2, "Viertel": quartiers};

    L.control.layers(controlMap, otherLayers, {collapsed:false}).addTo(leafletMap);

    // //Use via Leaflet plugin fullscreen https://github.com/Leaflet/Leaflet.fullscreen

    L.control.fullscreen({ position: "topright" }).addTo(leafletMap);

    var legend = L.control({ position: "bottomleft" });
	
    // add legend
    if (document.getElementById("mapBox2").parentElement.className == "bigMap") {
        legend.onAdd = function (map) {
            var div = L.DomUtil.create("div", "info legend");
            div.innerHTML +=
                "<h4>Legende</h4>" +
                'Personen <img src="' +
                createCanvasMarker("#5F9ea0", "#2F4F4F", null) +
                '" alt="blau"><br>' +
                'Unternehmen <img src="' +
                createCanvasMarker("#FF8C00", "#8B4513", null) +
                '" alt="orange"><br>' +
                'Beide <img src="' +
                createCanvasMarker("#8B008B", "#4B0082", null) +
                '" alt="violett"><br>';

            return div;
        };

        legend.addTo(leafletMap);
    }
}

// Use via Leaflet plugin https://github.com/Leaflet/Leaflet.markercluster
/**
 * Function for creating marker clusters. The clusters make it possible to count
 * the number of markers on one coordinate and to create a cluster marker indicating
 * the number of markers it contains. Furthermore the marker cluster do the
 * spiderfying, so that multiple markers on the same spot become visible on click.
 */
function initializeMarkercluster() {
    markers = L.markerClusterGroup({
        maxClusterRadius: 35,
        iconCreateFunction: function (cluster) {
            var types = new Map();

            cluster.getAllChildMarkers().forEach(function a(marker) {
                types.set(marker.options.id.includes("P") ? "P" : "C", true);
            });

            // Determine, which marker to use depending on the type of object (person, company, cluster of both)
            switch (types.size) {
                case 1:
                    if (types.has("P")) {
                        // return customHtmlIcon('#5F9ea0', '#2F4F4F', '12pt', '#FFFFFF', '<b>'+cluster.getChildCount()+'</b>');
                        return customCanvasIcon("#5F9ea0", "#2F4F4F", cluster.getChildCount());
                        break;
                    } else if (types.has("C")) {
                        // return customHtmlIcon('#FF8C00', '#8B4513', '12pt', '#FFFFFF', '<b>'+cluster.getChildCount()+'</b>');
                        return customCanvasIcon("#FF8C00", "#8B4513", cluster.getChildCount());
                        break;
                    }
                default:
                    // return customHtmlIcon('#8B008B', '#4B0082', '12pt', '#FFFFFF', '<b>'+cluster.getChildCount()+'</b>');
                    return customCanvasIcon("#8B008B", "#4B0082", cluster.getChildCount());
            }
        },
        zoomToBoundsOnClick: false,
        showCoverageOnHover: false,
    });

    markers.on("clusterclick", function (a) {
        a.layer.spiderfy();
        if (leafletMap.getZoom() < 14) a.layer.zoomToBounds({ padding: [20, 20], maxZoom: 14 });
    });
}

/**
 * Fetches the information about the person and company objects from the json-view of the current site and initializes
 * a marker for each object.
 */
function initializeMarkers() {
    // To access the information of the currently shown datasets, the Json export function is used.
    // The current URL is expanded with the parameter export=json and returns thus a Json representation
    // of the current datasets.
    var url = '/app/export';
    url = url + (window.location.search ? "&" : "?") + "exportAll=json";
    console.log(url);

    // The getJSON function works asynchronous, therefore everything, that needs the json code,
    // has to happen within the lambda expression of the getJSON function!
    $.getJSON(url, function (json) {
        if (json.person) mapPerson(json.person);
        if (json.company) mapCompany(json.company);
        if (json.persons) json.persons.forEach(mapPerson);
        if (json.companies) json.companies.forEach(mapCompany);

        leafletMap.addLayer(markers);
    });
}

function clickZoom(e) {
    if (leafletMap.getZoom() < 14) leafletMap.setView(e.target.getLatLng(), 14);
}

function mapPerson(json) {
    var name = "";
    if (json.title && !json.title.trim().length == 0) {
        name += json.title + " ";
    }
    if (json.name_predicate && !json.name_predicate.trim().length == 0) {
        name += json.name_predicate + " ";
    }
    name += json.surname;
    if (json.first_name && !json.first_name.trim().length == 0) {
        name += ", " + json.first_name;
    }

    makePinPerAddress(json.addresses, name, json.profession_verbatim, json.id, true);
}

function mapCompany(json) {
    var name = json.name;
    if (json.specification_verbatim && !json.specification_verbatim.trim().length == 0) {
        name += ", " + json.specification_verbatim;
    }

    makePinPerAddress(json.addresses, name, json.profession_verbatim, json.id, false);
}

/**
 * Takes a list of addresses and some information and creates a marker for each
 * address containing the given information.
 * @param {*} addressArray An array of addresses belonging to one object
 * @param {*} name Name of the object to whom the address belongs
 * @param {*} prof Profession of the object to whom the address belongs
 * @param {*} id The id of the object to whom the address belongs
 * @param {*} isPerson Boolean indicating, if the address belongs to a person or company
 */
function makePinPerAddress(addressArray, name, prof, id, isPerson) {
    addressArray.forEach(function (addr) {
        var addrFull = addr.street.name_old_clean;
        if (addrFull != addr.street.name_new) addrFull += " (" + addr.street.name_new + ")";
        if (addr.houseno) addrFull += " " + addr.houseno;
        if (addr.houseno_specification) addrFull += addr.houseno_specification;
        if (addr.address_specification_verbatim) addrFull += ", " + addr.address_specification_verbatim;

        var link = "/";
        link += isPerson ? "persons" : "companies";
        link += "/view/" + id;

        var mapPin = L.marker(
            L.latLng(
                // Take address coordinates if existing, otherwise take autodetected street coordinates
                addr.geo_lat || addr.street.geo_lat,
                addr.geo_long || addr.street.geo_long
            ),
            {
                // Specify the icons according to the object type
                // (if unspecified, the default blue leaflet marker is used)

                // Customized HTML-icons
                // icon: isPerson ? customHtmlIcon('#5F9ea0', '#2F4F4F', null, null, null) : customHtmlIcon('#FF8C00', '#8B4513', null, null, null),

                // Customized HTML canvas icons
                icon: isPerson ? customCanvasIcon("#5F9ea0", "#2F4F4F", null) : customCanvasIcon("#FF8C00", "#8B4513", null),

                // Markers resembling the original leaflet markers but having different colours
                // icon: isPerson ? colourMarker('blue') : colourMarker('orange'),

                id: (isPerson ? "P" : "C") + "-" + id + "-" + addr.id,
                riseOnHover: true,
            }
        );

        markers.addLayer(mapPin);

        // Create a popup and tooltip for the marker
        if (document.getElementById("mapBox2").parentElement.className == "smallMap") {
            mapPin.bindPopup('<span style="font-size:10pt;text-shadow:none">' + addrFull + "<br></span>", {
                maxWidth: document.getElementById("mapBox").offsetWidth - 40,
            });
            mapPin.bindTooltip(addr.street.name_old_clean);
        } else {
            mapPin.bindPopup('<span style="font-size:12pt;text-shadow:none"><h5>' + name + (prof ? "<br>" + prof : "") + "</h5>" + addrFull + "<br>" + '<a href="' + link + '">Zeige Datensatz</a>' + "</span>");
            mapPin.bindTooltip(name);
        }

        mapPin.on("click", clickZoom);
    });
}

// Options for customizd icons

// 1. Paint a marker with HTML5 canvas
// Got inspiration from https://gist.github.com/viktorkelemen/1451945
function customCanvasIcon(colour, borderColour, text) {
    return new L.Icon({
        iconUrl: createCanvasMarker(colour, borderColour, text),
        shadowUrl: "https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png",
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41],
    });
}

function createCanvasMarker(colour, borderColour, text) {
    var width = 25;
    var height = 30;
    var radius = 15;

    var canvas, context;

    canvas = document.createElement("canvas");
    canvas.width = width;
    canvas.height = height;

    context = canvas.getContext("2d");

    context.clearRect(0, 0, width, height);

    context.fillStyle = colour;
    context.strokeStyle = borderColour;

    context.beginPath();
    context.moveTo(radius, 0);
    context.lineTo(width - radius, 0);
    context.quadraticCurveTo(width, 0, width, height / 2);
    context.lineTo(width / 2, height);
    context.lineTo(0, height / 2);
    context.quadraticCurveTo(0, 0, radius, 0);
    context.closePath();

    context.fill();
    context.stroke();

    if (text) {
        context.font = "bold 8pt Arial";
        context.fillStyle = "white";
        context.textAlign = "center";
        context.fillText(text, width / 2, height / 2);
    }

    return canvas.toDataURL();
}

// 2. Create a marker by formatting an HTML div accordingly
// Inspiration source https://stackoverflow.com/a/40870439
function customHtmlIcon(colour, borderColour, fontSize, fontColour, text) {
    var markerHtmlStyles =
        "background-color: " +
        colour +
        ";" +
        "width: 3rem;" +
        "height: 3rem;" +
        "display: block;" +
        "left: -3rem;" +
        "top: -0.5rem;" +
        // UNCOMMENT the following lines to have on edge markers pointing down to the geopoint (the tip of the marker is the lowest point)
        // Problem: it also rotates any text contained
        // + 'left: -1.5rem;'
        // + 'top: -1.5rem;'
        // + 'transform: rotate(45deg);'
        "position: relative;" +
        "border-radius: 3rem 3rem 0;" +
        "border: 1px solid " +
        borderColour +
        ";";
    var textStyles =
        "font-size: " +
        (fontSize ? fontSize : "12pt") +
        ";" +
        "color: " +
        (fontColour ? fontColour : "black") +
        ";" +
        "position = absolute;" +
        "padding: 1rem;" +
        //+ 'transform: rotate(45deg);'
        "text-align: center;";

    return L.divIcon({
        className: "mapPin",
        iconAnchor: [0, 24],
        labelAnchor: [-6, 0],
        popupAnchor: [0, -36],
        html: '<div style="' + markerHtmlStyles + '"><span style="' + textStyles + '">' + (text ? "<b>" + text + "</b>" : "") + "</span></div>",
    });
}

// 3. Use icon-images such as provided by this github project. Problem: they don't except any HTML-properties, thus the markercluster
// can't write the number of markers automatically
// From https://github.com/pointhi/leaflet-color-markers
function colourMarker(colour) {
    return new L.Icon({
        iconUrl: "https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-" + colour + ".png",
        shadowUrl: "https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png",
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41],
    });
}

// 4. Creating your own markers using personalized picture files (could pose same problem as 3.)
setInterval(function () {
   leafletMap.invalidateSize();
}, 100);
