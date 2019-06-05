<?php
/**
 * EasePHPbricks - Live Age
 *
 * @author     Vítězslav Dvořák <vitex@arachne.cz>
 * @copyright  2018 Vitex Software
 */

namespace Ease\ui;

/**
 * LiveAge
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class LiveAge extends \Ease\Html\TimeTag
{

    /**
     * Show live time to timestamp
     * 
     * @param long  $timestamp   UnixTime
     * @param array $properties  TimeTag properties
     */
    public function __construct($timestamp, $properties = [])
    {
        $age  = time() - $timestamp;
        $days = floor($age / 86400);
        $dater = new \DateTime();
        $dater->setTimestamp($timestamp);
        $properties['datetime'] = $dater->format('Y-m-d\TH:i:s');
        parent::__construct($days.' '._('days').', '.gmdate("G:i:s", $age),
            $properties);
        $this->setTagID();

        $this->addJavaScript('
var timestamp'.$this->getTagID().' = '.$age.';

function component(x, v) {
    return Math.floor(x / v);
}

var $div'.$this->getTagID().' = $(\'#'.$this->getTagID().'\');

setInterval(function() {

    timestamp'.$this->getTagID().'++;

    var days'.$this->getTagID().'    = component(timestamp'.$this->getTagID().', 24 * 60 * 60),
        hours'.$this->getTagID().'   = component(timestamp'.$this->getTagID().',      60 * 60) % 24,
        minutes'.$this->getTagID().' = component(timestamp'.$this->getTagID().',           60) % 60,
        seconds'.$this->getTagID().' = component(timestamp'.$this->getTagID().',            1) % 60;

    $div'.$this->getTagID().'.html(days'.$this->getTagID().' + " '._('days').', " + hours'.$this->getTagID().' + ":" + minutes'.$this->getTagID().' + ":" + seconds'.$this->getTagID().');

}, 1000);
            ');
    }
}
