<?php
/**
 * EasePHPbricks - TwitterBootstrap Switch
 *
 * 
 * @author     Vítězslav Dvořák <vitex@arachne.cz>
 * @copyright  2016 Vitex Software
 */
include '../vendor/autoload.php';

$oPage = new \Ease\TWB\WebPage('Semafor LED light - EasePHP Bricks ');

$oPage->addItem(new \Ease\ui\SemaforLight(true)); //Success Green
$oPage->addItem(new \Ease\ui\SemaforLight('warning')); //Warning Orange
$oPage->addItem(new \Ease\ui\SemaforLight('#EF1919')); //Custom Color
$oPage->addItem(new \Ease\ui\SemaforLight(false));     //Danger Red

$oPage->draw();
