<?php
/**
 * EasePHPbricks - LiveAge example
 *
 * 
 * @author     Vítězslav Dvořák <vitex@arachne.cz>
 * @copyright  2016 Vitex Software
 */
include '../vendor/autoload.php';

define('EASE_APPNAME', 'Ease-Framework');

$oPage = new \Ease\TWB\WebPage(_('Live Age'));

$dater = new \DateTime();
$dater->modify('-7 days');

$oPage->addItem(new \Ease\TWB\Container(new Ease\TWB\Well(new \Ease\ui\LiveAge($dater->getTimestamp()))));

$oPage->draw();
