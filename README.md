Geo Search Plugin
=================

[![Latest Version](https://img.shields.io/github/tag/2amigos/yii2-leaflet-geocoder-plugin.svg?style=flat-square&label=release)](https://github.com/2amigos/yii2-leaflet-geocoder-plugin/tags)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/2amigos/yii2-leaflet-geocoder-plugin/master.svg?style=flat-square)](https://travis-ci.org/2amigos/yii2-leaflet-geocoder-plugin)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/2amigos/yii2-leaflet-geocoder-plugin.svg?style=flat-square)](https://scrutinizer-ci.com/g/2amigos/yii2-leaflet-geocoder-plugin/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/2amigos/yii2-leaflet-geocoder-plugin.svg?style=flat-square)](https://scrutinizer-ci.com/g/2amigos/yii2-leaflet-geocoder-plugin)
[![Total Downloads](https://img.shields.io/packagist/dt/2amigos/yii2-leaflet-geocoder-plugin.svg?style=flat-square)](https://packagist.org/packages/2amigos/yii2-leaflet-geocoder-plugin)


Yii 2 [LeafletJs](http://leafletjs.com/) Plugin that adds support for address lookup to
Leaflet with dropdown list capabilities and loading icon feedback. This Plugin works in conjunction with
[LeafLet](https://github.com/2amigos/yii2-leaflet-extension) library for [Yii 2](https://github.com/yiisoft/yii2)
framework.

***Important***
The libraries used on this plugin have been modified from
[the original plugin source](https://github.com/perliedman/leaflet-control-geocoder). So, if you wish to modify the
plugin, remember that you cannot update it from its original source.

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require ttungbmt/yii2-leaflet-geocoder "@dev"
```
or add

```json
"ttungbmt/yii2-leaflet-geocoder" : "@dev"
```

to the require section of your application's `composer.json` file.

Usage
-----

There are four services that you can use, even though we have implemented only three:

- Nominatim
- Bing
- MapQuest
- Google
- HCMGIS
- Mapbox
- Here

Anybody will to help integrate more services, is very welcome :)



```
use dosamigos\leaflet\layers\TileLayer;
use ttungbmt\leaflet\Leaflet;
use dosamigos\leaflet\types\LatLng;
use ttungbmt\leaflet\ServiceNominatim;
use ttungbmt\leaflet\GeoCoder;


// lets use nominating service
$hcmgis = new ServiceHCMGIS();

// create geocoder plugin and attach the service
$geoCoderPlugin = new GeoCoder([
    'service' => $hcmgis,
    'clientOptions' => [
        // we could leave it to allocate a marker automatically
        // but I want to have some fun
        'defaultMarkGeocode' => false
    ],
    'clientEvents'  => [
        'markgeocode' => new JsExpression('function(e){ console.log(e) }')
    ]
]);

// add a marker to center
$marker = new Marker([
    'name' => 'geoMarker',
    'latLng' => $center,
    'clientOptions' => ['draggable' => true], // draggable marker
    'clientEvents' => [
        'dragend' => 'function(e){
            console.log(e.target._latlng.lat, e.target._latlng.lng);
        }'
    ]
]);

// configure the tile layer
$tileLayer = new TileLayer([
    'urlTemplate' => 'http://otile{s}.mqcdn.com/tiles/1.0.0/map/{z}/{x}/{y}.jpeg',
    'clientOptions' => [
        'attribution' => 'Tiles Courtesy of <a href="http://www.mapquest.com/" target="_blank">MapQuest</a> ' .
            '<img src="http://developer.mapquest.com/content/osm/mq_logo.png">, ' .
            'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' .
            '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
        'subdomains' => '1234'
    ]
]);

// initialize our leafLet component
$leaflet = new Leaflet([
    'name' => 'geoMap',
    'tileLayer' => $tileLayer,
    'center' => $center,
    'zoom' => 10,
]);

// add the marker
$leaflet->addLayer($marker);

// install the plugin
$leaflet->installPlugin($geoCoderPlugin);

// run the widget (you can also use dosamigos\leaflet\widgets\Map::widget([...]))
echo $leaflet->widget();

```

Testing
-------

```bash
$ ./vendor/bin/phpunit
```

Contributing
------------

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

Credits
-------

- [Antonio Ramirez](https://github.com/tonydspaniard)
- [All Contributors](../../contributors)

License
-------

The BSD License (BSD). Please see [License File](LICENSE.md) for more information.

> [![2amigOS!](http://www.gravatar.com/avatar/55363394d72945ff7ed312556ec041e0.png)](http://www.2amigos.us)  
<i>Web development has never been so fun!</i>  
[www.2amigos.us](http://www.2amigos.us)
