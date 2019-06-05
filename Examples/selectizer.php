<?php
/**
 * EasePHPbricks - LiveAge example
 *
 * 
 * @author     Vítězslav Dvořák <vitex@arachne.cz>
 * @copyright  2016 Vitex Software
 */
include '../vendor/autoload.php';

class Selector extends \Ease\Html\SelectTag
{

    use \Ease\ui\Selectizer;
}

class Chooser extends Ease\Html\InputTextTag
{

    use \Ease\ui\Selectizer;
}

$oPage = new \Ease\TWB\WebPage(_('Selectizer Example'));

$form = new \Ease\TWB\Form('selectizer');

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

$ch                    = new Chooser('chooser');
$properties['plugins'] = ['remove_button'];
$ch->selectize($properties, $options);

$form->addInput($s, _('Select Color'));
$form->addInput($ch, _('Choose colors'));

$oPage->addItem(new \Ease\TWB\Container($form));

$oPage->draw();
