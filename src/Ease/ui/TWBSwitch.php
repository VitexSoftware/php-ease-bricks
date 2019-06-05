<?php
/**
 * EasePHPbricks - TwitterBootstrap Switch
 *
 * @link       https://github.com/Bttstrp/bootstrap-switch 
 * @author     Vítězslav Dvořák <vitex@arachne.cz>
 * @copyright  2016 Vitex Software
 */

namespace Ease\ui;

class TWBSwitch extends \Ease\Html\CheckboxTag
{
    /**
     * Properties holder
     * @var array
     */
    public $properties = [];

    /**
     * Twitter Bootstrap switch
     *
     * @param string $name       tag name
     * @param bool   $checked    checkbox state
     * @param string $value      returned value
     * @param array  $properties tag parameters
     */
    public function __construct($name, $checked = false, $value = null,
                                $properties = null)
    {
        parent::__construct($name, $checked, $value, $properties);
        if (!isset($properties['onText'])) {
            $properties['onText'] = _('Yes');
        }
        if (!isset($properties['offText'])) {
            $properties['offText'] = _('No');
        }

        $this->setProperties($properties);
    }

    /**
     * Properties setter
     * 
     * @param array $properties values to change
     */
    public function setProperties($properties)
    {
        $this->properties = array_merge($this->properties, $properties);
    }

    /**
     * Include requied assets in page
     */
    public function finalize()
    {
        \Ease\TWB\Part::twBootstrapize();
        $this->includeCss('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/css/bootstrap2/bootstrap-switch.css');
        $this->includeJavascript('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.js');
        $this->addJavascript('$("[name=\''.$this->getTagName().'\']").bootstrapSwitch({'.\Ease\TWB\Part::partPropertiesToString($this->properties).'})',
            null, true);
    }
}
