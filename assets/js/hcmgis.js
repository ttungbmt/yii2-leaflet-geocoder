L.Control.Geocoder.HCMGIS = L.Class.extend({
    options: {
        serviceUrl: 'http://sonha.hcmgis.vn/api/pt_addr/search',
        geocodingQueryParams: {},
        reverseQueryParams: {}
    },

    initialize: function(key, options) {
        L.setOptions(this, options);
        // Backwards compatibility
        this.options.serviceUrl = this.options.service_url || this.options.serviceUrl;
    },

    geocode: function(query, cb, context) {
        let params = {
            search: query,
            limit: 5
        };

        params = L.Util.extend(params, this.options.geocodingQueryParams);

        $.getJSON(this.options.serviceUrl, params, function(data) {
            let results = [],
                loc,
                latLng,
                latLngBounds;
            if (data.resources && data.resources.length) {
                for (let i = 0; i <= data.resources.length - 1; i++) {
                    loc = data.resources[i];
                    let props = loc.properties,
                        coords = loc.geometry.coordinates
                    ;
                    latLng = L.latLng(coords[1], coords[0]);
                    latLngBounds = L.latLngBounds([latLng]);

                    let name = `${props.sonha} ${props.tenduong} - ${props.tenphuong} - ${props.tenquan}`

                    results[i] = {
                        name: name,
                        bbox: latLngBounds,
                        center: latLng,
                        properties: props
                    };
                }
            }

            cb.call(context, results);
        });
    },

    reverse: function(location, scale, cb, context) {
        var params = {
            latlng: encodeURIComponent(location.lat) + ',' + encodeURIComponent(location.lng)
        };
        params = L.Util.extend(params, this.options.reverseQueryParams);
        console.log(this.options.serviceUrl, params);

        // getJSON(this.options.serviceUrl, params, function(data) {
        //     var results = [],
        //         loc,
        //         latLng,
        //         latLngBounds;
        //     if (data.results && data.results.length) {
        //         for (var i = 0; i <= data.results.length - 1; i++) {
        //             loc = data.results[i];
        //             latLng = L.latLng(loc.geometry.location);
        //             latLngBounds = L.latLngBounds(
        //                 L.latLng(loc.geometry.viewport.northeast),
        //                 L.latLng(loc.geometry.viewport.southwest)
        //             );
        //             results[i] = {
        //                 name: loc.formatted_address,
        //                 bbox: latLngBounds,
        //                 center: latLng,
        //                 properties: loc.address_components
        //             };
        //         }
        //     }
        //
        //     cb.call(context, results);
        // });
    }
});

L.Control.Geocoder.hcmgis = function(key) {
    return new L.Control.Geocoder.HCMGIS(key);
};