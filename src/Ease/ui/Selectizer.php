<?php
/**
 * Common selectize.js based input
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 * @copyright (c) 2019, Vitex Software
 */

namespace Ease\ui;

/**
 * Description of GroupChooser
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
trait Selectizer
{

    /**
     * Selectize.js for Ease Input/Select widgets
     * 
     * @param array $settings see https://github.com/selectize/selectize.js/blob/master/docs/api.md
     * @param array $values   [value=>label,value=>label,...]
     */
    public function selectize($settings = [], $values = [])
    {
        if (empty($this->getTagID())) {
            $this->setTagID();
        }

        if ($values) {
            $settings['options'] = $values;
        }

        $this->addJavaScript("
$('#".$this->getTagID()."').selectize({
".\Ease\JQuery\Part::partPropertiesToString($settings)."    
});
");

        $this->includeJavaScript('https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.js');
        $this->includeCss('https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.min.css');
        $this->includeCss('https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css');
    }
}
