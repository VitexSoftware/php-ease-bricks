<?php

/**
 * Ease Bricks - Selectizer example
 *
 * 
 * @author     Vítězslav Dvořák <info@vitexsoftware.cz>
 * @copyright  2016-2023 Vitex Software
 */
include '../vendor/autoload.php';

class Selector extends \Ease\Html\SelectTag {

    use \Ease\ui\Selectizer;
}

class Chooser extends Ease\Html\InputTextTag {

    use \Ease\ui\Selectizer;
}

$oPage = new \Ease\WebPage(_('Selectizer Example'));
$oPage->includeJavaScript('https://code.jquery.com/jquery-3.7.1.min.js');

$form = new \Ease\Html\Form(['name' => 'selectizer']);

$properties = [
    'valueField' => 'value',
    'labelField' => 'key',
    'searchField' => ['key', 'value']
];

$options = [
    ['key' => 'red', 'value' => 'Red'],
    ['key' => 'blue', 'value' => 'Blue'],
    ['key' => 'green', 'value' => 'Green'],
    ['key' => 'yellow', 'value' => 'Yellow'],
];

$s = new Selector('selector');
$s->selectize($properties, $options);

$ch = new Chooser('chooser');
$properties['plugins'] = ['remove_button'];
$ch->selectize($properties, $options);

$form->addItem([_('Select Color'), $s]);
$form->addItem('<br>');
$form->addItem([_('Choose colors'), $ch]);

$oPage->addItem($form);

$oPage->draw();
