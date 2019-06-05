<?php
/**
 * EasePHPbricks - TwitterBootstrap Switch example
 *
 * 
 * @author     Vítězslav Dvořák <vitex@arachne.cz>
 * @copyright  2016 Vitex Software
 */

include '../vendor/autoload.php';

$oPage = new \Ease\TWB\WebPage('TWB Switch - EasePHP Bricks ');

$oPage->addItem(new Ease\ui\TWBSwitch('swname', true, 1,
    ['onText' => 'YES', 'offText' => 'NO']));

$oPage->draw();
