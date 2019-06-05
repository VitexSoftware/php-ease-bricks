<?php
/**
 * EaseBricks - Top Of the page.
 *
 * @author     Vítězslav Dvořák <vitex@arachne.cz>
 * @copyright  2015-2018 Spoje.Net
 */

namespace Ease\ui;
/**
 * Page TOP.
 */
class PageTop extends \Ease\Html\DivTag
{
    /**
     * Page Title.
     *
     * @var string
     */
    public $pageTitle = 'Page Heading';

    /**
     * Nastavuje titulek.
     *
     * @param string $pageTitle
     */
    public function __construct($pageTitle = null)
    {
        parent::__construct();
        if (!is_null($pageTitle)) {
            \Ease\Shared::webPage()->setPageTitle($pageTitle);
        }
    }

    /**
     * Vloží vršek stránky a hlavní menu.
     */
    public function finalize()
    {
        $this->addItem(new MainMenu());

        if (get_class(\Ease\Shared::user()) == 'SpojeNet\System\User') {
            $this->addItem(new History());
        }
    }
}
