<?php

$I = new AcceptanceTester($scenario);
$I->wantTo('MainPageMenu');
$I->amOnPage('/VitexSoftware/EasePHPbricks/Examples/mainpagemenu.php');
$I->seeElement("img[src=\"https://www.vitexsoftware.cz/img/ease-framework-logo.png\"]");
$I->seeElement("img[src=\"https://www.vitexsoftware.cz/img/icinga_editor-logo.png\"]");
$I->dontSee('( ! )');


