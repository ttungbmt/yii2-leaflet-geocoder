<?php
/**
 * @copyright Copyright (c) 2013-2019 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace ttungbmt\leaflet\plugins\geocoder\services;

use ttungbmt\leaflet\plugins\geocoder\BaseService;
use yii\base\InvalidConfigException;
use yii\helpers\Json;
use yii\web\JsExpression;

/**
 * ServiceBing provides the required code and js files to use Bing geocoding service
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\leaflet\plugins\geocoder
 */
class ServiceHere extends BaseService
{
    /**
     * @inheritdoc
     * @codeCoverageIgnore
     */
    public function registerAssetBundle($view)
    {

    }

    /**
     * @return \yii\web\JsExpression the javascript code for the geocoder option to be set
     */
    public function getJs()
    {
        $options = Json::encode($this->clientOptions);
        return new JsExpression("L.Control.Geocoder.here({$options})");
    }
}
