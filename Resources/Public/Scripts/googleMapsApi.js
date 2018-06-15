/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var mapProp;
var test;
var data; 
var marker = ''; 

/**
 * 
 * @returns {undefined}
 */
function initMap() {
}

/**
 * 
 * @returns {undefined}
 */
function activateMap() {
    $map = $('#map');
    map = new google.maps.Map(document.getElementById("map"), mapProp);
    geocoder($map.closest('form'));

    $( '.geocode-on-blur').change( function() {
        geocoder( $(this).closest('form') );
    });
    
    
	// if (typeof($map.attr('id')) !== 'undefined') geocoder($map.closest('form'));
}


/**
 * 
 * @param {type} $form
 * @returns {undefined}
 */
function geocoder( $form ) {
    zoom = 15;
    mapType = google.maps.MapTypeId.ROADMAP;

    if ($('#zoom', $form).val() > 0) {
        zoom = makeInt($('#zoom', $form).val());
    }

    if ($('#mapType', $form).val() != '') {
        mapType = $('#mapType', $form).val();
    }

    // convert country to uppercase
    country = $('#country', $form).val();
    country = country.toUpperCase();
    console.log(country);
    $('#country', $form).val(country);
    
    switch (country) {
        case 'A': country = 'AT'; 
            break;
        case 'D': country = 'DE'; 
            break;
    }
    
    data = {
        zip: $('#zip', $form).val(),
        city: $('#city', $form).val(),
        address: $('#address', $form).val(),
        number: $('#number', $form).val(),
        geoOnly: $('#geoOnly', $form).prop('checked'),
        lat: $('#lat', $form).val(),
        lon: $('#lon', $form).val()
    }

    if (data.address.length < 3 && data.zip.length < 3) {
        zoom = 12;
        data = {
            country: 'AT',
            zip: '4020',
            city: 'Linz',
            address: '',
            number: '',
            geoOnly: false
        }
    }
    
    var geocoder = new google.maps.Geocoder();
    var map = null;
	var address;

	if (data.geoOnly) {
        // geoOnly is checked
        var latlng = new google.maps.LatLng(parseFloat(data.lat), parseFloat(data.lon));
        
        var myOptions = {
            zoom: zoom,
            center: latlng,
            mapTypeControl: true,
            mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
            navigationControl: true,
            mapTypeId: mapType
        };    

        map = new google.maps.Map(document.getElementById( $form.find( '.googlemap' ).attr('id') ), myOptions);
        
        marker = new google.maps.Marker({
            position: latlng,
            map: map, 
            title:address,
            draggable:true
        }); 
                        
        google.maps.event.addListener(marker, 'dragend', function(pos) {
            geocodePosition($form, marker.getPosition());
            $('#lat', $form).attr('value', marker.getPosition().lat());
            $('#lon', $form).attr('value', marker.getPosition().lng());
        });    

        google.maps.event.addListener(map, 'click', function(pos) {
            geocodePosition($form, pos.latLng);
            marker.setPosition(pos.latLng);
            $('#lat', $form).attr('value', marker.getPosition().lat());
            $('#lon', $form).attr('value', marker.getPosition().lng());
        });    
                        
	} else {
        var myOptions = {
            zoom: zoom,
            mapTypeControl: true,
            mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
            navigationControl: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };    

        map = new google.maps.Map(document.getElementById( $form.find( '.googlemap' ).attr('id') ), myOptions);        
        
        if (geocoder) {
            address = data.zip + ', ' + data.city + ', ' + ', ' + data.address + ', ' + data.number;
            geocoder.geocode( { 'address': address}, function(results, status) {
                if ( (status == google.maps.GeocoderStatus.OK) & (status != google.maps.GeocoderStatus.ZERO_RESULTS)) {
                    map.setCenter(results[0].geometry.location);
                    $('#lat', $form).attr('value', results[0].geometry.location.lat());
                    $('#lon', $form).attr('value', results[0].geometry.location.lng());
                    
                    marker = new google.maps.Marker({
                        position: results[0].geometry.location,
                        map: map, 
                        title:address,
                        draggable:true
                    }); 

                    google.maps.event.addListener(marker, 'dragend', function() {
                        geocodePosition($form, marker.getPosition());
                    });    

                    google.maps.event.addListener(map, 'click', function(pos) {
                        geocodePosition($form, pos.latLng);
                        marker.setPosition(pos.latLng);
                    });    
                } else {
                    alert("Geocode was not successful for the following reason: " + status);
                }
            });
        }
	}
    
    google.maps.event.addListener(map, 'zoom_changed', function() {
        $('#zoom', $form).attr('value', map.getZoom());
    });

    google.maps.event.addListener(map, 'maptypeid_changed', function() {
        $('#mapType', $form).attr('value', map.getMapTypeId());        
    });

}

/**
 * 
 * @param {type} $form
 * @param {type} pos
 * @returns {undefined}
 */
function geocodePosition($form, pos) {
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode ({latLng: pos}, function(results, status) {
        test = results;
        test.status = status;
        if (status == google.maps.GeocoderStatus.OK) {
            if (! $('#geoOnly', $form ).prop('checked')) {
                $('#country', $form).val(findProperty(results[0], 'country'));
                $('#state', $form).val(findProperty(results[0], 'administrative_area_level_1'));
                $('#zip', $form).val(findProperty(results[0], 'postal_code'));
                $('#city', $form).val(findProperty(results[0], 'locality'));
                $('#address', $form).val(findProperty(results[0], 'route'));
                $('#number', $form).val(findProperty(results[0], 'street_number'));
                $('#lat', $form).val( dec2deg(results[0].geometry.location.lat(), 'LAT', 'de')  );
                $('#lon', $form).val( dec2deg(results[0].geometry.location.lng(), 'LON', 'de')  );

                country = findProperty(results[0], 'country'); 
                switch (country) {
                    case 'Österreich': country = 'A'; break;
                    case 'Austria': country = 'A'; break;
                }
                $('#country', $form).val(country);
            }
        }
    });
}

/**
 * findProperty
 * 
 * @param object object
 * @param string property
 * 
 * Localizes the property property in object and returns its value
 */
function findProperty(object, property) {
    for (i=0; i < object.address_components.length; i++) {
        if (property == object.address_components[i].types[0]) return object.address_components[i].long_name;
    }
    return '';
}


function dec2deg ( value, latorlong, lang) {
    return value;
    _lang = [];
    _lang.de = ['N','S','O','W'] ;
    _lang.en = ['N','S','E','W'] ;

    indexOffset = 0;
    if (value < 0) {
        value = -value;
        indexOffset = 1;
    }

    if (latorlong == 'LAT') {
        text = _lang[lang][0 + indexOffset] + ' ' + Math.floor(value);
    }
    if (latorlong == 'LON') {
        text = _lang[lang][2 + indexOffset] + ' ' + Math.floor(value);
    }
    minutes = (value - Math.floor(value)) * 60;
    seconds = Math.round((minutes - Math.floor(minutes)) * 60 * 10000) / 10000;
            
    return text + "° " + Math.floor(minutes) + "' " + seconds + '"';
}