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

$oPage->addItem(new Ease\ui\OldTerminal($text));

$oPage->draw();
