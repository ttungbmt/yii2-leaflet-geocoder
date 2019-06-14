<?php
/**
 * @copyright Copyright (c) 2013-2019 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace ttungbmt\leaflet\plugins\geocoder\services;

use yii\web\AssetBundle;

/**
 * ServiceBingAsset
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\leaflet\plugins\geocoder
 */
class ServiceHCMGISAsset extends AssetBundle
{
    public $publishOptions = [
        'forceCopy' => true,
//        'only' => [
//
//        ]
    ];

    public $css = [
    ];

    public $js = [
        'js/hcmgis.js',
    ];

    public function init()
    {
        parent::init();
        $this->sourcePath = dirname(__DIR__, 2) . '/assets';
    }

    public $depends = [
        'ttungbmt\leaflet\plugins\geocoder\GeoCoderAsset'
    ];
}
