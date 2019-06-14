<?php
namespace ttungbmt\leaflet\plugins\geocoder;

class GeocoderAsset extends \yii\web\AssetBundle
{
    public $publishOptions = [
//        'forceCopy' => true,
//        'only' => [
//
//        ]
    ];

    public $css = [
        'node_modules/leaflet-control-geocoder/dist/Control.Geocoder.css',
    ];

    public $js = [
        'node_modules/leaflet-control-geocoder/dist/Control.Geocoder.min.js',
        'js/hcmgis.js',
    ];

    public function init()
    {
        parent::init();
        $this->sourcePath = dirname(__DIR__) . '/assets';
    }
}