<?php
namespace ttungbmt\leaflet\plugins\geocoder;

use yii\web\JsExpression;

class Geocoder extends \dosamigos\leaflet\plugins\geocoder\GeoCoder
{
    public function encode()
    {
        $this->clientOptions['geocoder'] = $this->getService()->getJs();

        $options = $this->getOptions();
        $name = $this->getName();
        $map = $this->map;

        $js = "new L.Control.Geocoder($options).addTo($map)";

        if (!empty($name)) {
            $js = "let $name = $js;";
        }
        $js .= $this->getEvents() . ($map !== null && empty($name) ? ";" : "");
        return new JsExpression($js);
    }

}