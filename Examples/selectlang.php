<?php
/**
 * EasePHPbricks - LangSelect Switch example
 *
 * 
 * @author     Vítězslav Dvořák <vitex@arachne.cz>
 * @copyright  2018 Vitex Software
 */
include '../vendor/autoload.php';

define('EASE_APPNAME', 'Ease-Framework');

$oPage = new \Ease\TWB\WebPage(_('Czech').'/'._('English'));

$container = new \Ease\TWB\Container(new \Ease\ui\LangSelect());
$container->addItem(new Ease\TWB\Well(new \Ease\Html\H1Tag(_('Hallo'))));


$oPage->addItem($container);

$oPage->draw();
