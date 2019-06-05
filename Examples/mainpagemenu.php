<?php
/**
 * EasePHPbricks - TwitterBootstrap Switch
 *
 * 
 * @author     Vítězslav Dvořák <vitex@arachne.cz>
 * @copyright  2016 Vitex Software
 */
 
include '../vendor/autoload.php';

$mpmenu = new \Ease\ui\MainPageMenu();

$mpmenu->addMenuItem('https://www.vitexsoftware.cz/img/ease-framework-logo.png', 'Ease Framework', 'https://www.vitexsoftware.cz/ease.php');
$mpmenu->addMenuItem('https://www.vitexsoftware.cz/img/icinga_editor-logo.png', 'Icinga Editor', 'https://www.vitexsoftware.cz/icinga-editor/');

$oPage = new \Ease\TWB\WebPage('Mainpage Menu - EasePHP Bricks ');

$oPage->addItem( new Ease\TWB\Container( $mpmenu ) );

$oPage->draw();
