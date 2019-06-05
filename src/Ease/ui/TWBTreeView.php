<?php
/**
 * EasePHPbricks - TwitterBootstrap TreeView
 *
 * @link       https://github.com/jonmiles/bootstrap-treeview 
 * @author     Vítězslav Dvořák <vitex@arachne.cz>
 * @copyright  2018 Vitex Software
 */

namespace Ease\ui;

class TWBTreeView extends \Ease\Html\DivTag
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
     * @param array  $properties tag parameters
     */
    public function __construct($name, $properties = null)
    {
        parent::__construct(null, ['id' => $name]);
        $this->properties = $properties;
    }

    /**
     * Include requied assets in page
     */
    public function finalize()
    {
        \Ease\TWB\Part::twBootstrapize();
        $this->includeJavascript('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js');
        $this->includeCss('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css');
        $this->addJavascript('$(\'#'.$this->getTagID().'\').treeview({'.\Ease\TWB\Part::partPropertiesToString($this->properties).'})',
            null, true);
    }
}
