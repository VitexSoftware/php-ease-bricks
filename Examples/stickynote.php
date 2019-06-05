<?php
/**
 * EasePHPbricks - LiveAge example
 *
 * 
 * @author     Vítězslav Dvořák <vitex@arachne.cz>
 * @copyright  2016 Vitex Software
 */
include '../vendor/autoload.php';

define('EASE_APPNAME', 'Sticky Note');

$oPage = new \Ease\TWB\WebPage(_('Sticky note'));

$stickynote = new Ease\ui\StickyNote(new Ease\Html\H1Tag(_('Sticky note')));
$stickynote->addItem( new \Ease\Html\HrTag() );
$stickynote->addItem( new \Ease\Html\ImgTag('../project-logo.svg','EaseBricks', ['style'=>'width: 200px; margin: auto;'] ));
$stickynote->addItem(new Ease\Html\DivTag(_('Yellow sticky note')));

$oPage->addItem(new \Ease\TWB\Container(['<br>',$stickynote] ));

$oPage->draw();
