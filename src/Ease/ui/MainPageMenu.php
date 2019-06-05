<?php
/**
 * EasePHPbricks - Mainpage Large Icons Menu
 *
 * 
 * @author     Vítězslav Dvořák <vitex@arachne.cz>
 * @copyright  2016-2017 Vitex Software
 */

namespace Ease\ui;

class MainPageMenu extends \Ease\Html\DivTag
{
    /**
     * Sem se přidávají položky.
     *
     * @var \Ease\Html\DivTag
     */
    public $row = null;

    /**
     * Rámeček nabídky.
     *
     * @var \Ease\Html\DivTag
     */
    public $well = null;

    /**
     * 
     */
    public function __construct()
    {
        parent::__construct(
            null, null,
            [
            'class' => 'container',
            'style' => 'margin: auto;',
            ]
        );
        $this->well = new \Ease\TWB\Well();
        $this->row  = new \Ease\TWB\Row();
    }

    /**
     * Add Item to mainpage Menu
     * 
     * @param string $image url
     * @param string $title caption
     * @param string $url   image link href url
     * 
     * @return \Ease\Html\ATag
     */    public function addMenuItem($image, $title, $url)
    {
        return $this->row->addItem(
                new \Ease\Html\ATag(
                $url,
                new \Ease\TWB\Col(2,
                "$title<center><img class=\"img-responsive\" src=\"$image\" alt=\"$title\"></center>")
                )
        );
    }

    /**
     * Assembly widget
     */
    public function finalize()
    {
        $this->well->addItem($this->row);
        $this->addItem($this->well);
        parent::finalize();
    }
    
}
