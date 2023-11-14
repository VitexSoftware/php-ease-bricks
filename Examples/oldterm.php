<?php

/**
 * EasePHPbricks - Old Terminal Component
 *
 * 
 * @author     Vítězslav Dvořák <vitex@arachne.cz>
 * @copyright  2023 Vitex Software
 */
 
include '../vendor/autoload.php';


ob_start();
passthru("ls -la");
$text = ob_get_clean();

$oPage = new Ease\WebPage(_('Old Terminal'));

$oPage->addItem(new \Ease\Html\H2Tag(_('Green Terminal')));

$oPage->addItem(new Ease\ui\OldTerminal($text));

$oPage->addItem(new \Ease\Html\H2Tag(_('Red Terminal')));

$oPage->addItem((new Ease\ui\OldTerminal($text))->setBackRed(150)->setBackGreen(10)->setBlue(10)->setFontColor('yellow'));

$oPage->draw();
