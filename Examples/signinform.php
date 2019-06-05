<?php
/**
 * EasePHPbricks - LoginForm example
 *
 * 
 * @author     Vítězslav Dvořák <vitex@arachne.cz>
 * @copyright  2018 Vitex Software
 */
include '../vendor/autoload.php';

define('EASE_APPNAME', 'Ease-Framework');

$oPage = new \Ease\TWB\WebPage(_('Login Form'));

$signin = new \Ease\ui\SignInForm();

//Add Custom Input here
$signin->addInput(new Ease\ui\TWBSwitch('remember'), _('Remember me'));

$signin->fillUp($_REQUEST);

$oPage->addItem(new \Ease\TWB\Container(new \Ease\TWB\Panel(_('Sign In'),
    'info', $signin)));

$oPage->draw();
