<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Twitter Bootstrap Switch');
$I->amOnPage('/VitexSoftware/EasePHPbricks/Examples/twbswitch.php');
$I->seeElement("input[name=\"swname\"]");
$I->dontSee('( ! )');
