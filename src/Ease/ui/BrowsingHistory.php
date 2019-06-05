<?php
/**
 * EasePHP Bricks - Browsing History.
 *
 * @author     Vítězslav Dvořák <vitex@arachne.cz>
 * @copyright  2016-2018 Vitex Software
 */

namespace Ease\ui;

/**
 * Show history of visited pages in app
 * 
 * @param mixed $content
 * @param array $properties
 */
class BrowsingHistory extends \Ease\Html\DivTag
{

    /**
     * Show history of visited pages in app
     * 
     * @param mixed $content
     * @param array $properties
     */
    public function __construct($content = null, $properties = null)
    {
        $webPage = \Ease\Shared::webPage();
        if (is_null($properties)) {
            $properties = [];
        }
        $properties['id'] = 'history';

        if (!isset($_SESSION['history'])) {
            $_SESSION['history'] = [];
        }

        parent::__construct(null, $properties);

        $currentUrl   = \Ease\Page::phpSelf(false);
        $currentTitle = $webPage->pageTitle;


        foreach ($_SESSION['history'] as $hid => $page) {
            if ($page['url'] == $currentUrl) {
                unset($_SESSION['history'][$hid]);
            }
        }
        array_unshift($_SESSION['history'],
            ['url' => $currentUrl, 'title' => $currentTitle]);
        foreach ($_SESSION['history'] as $bookmark) {
            $this->addItem(new \Ease\Html\SpanTag(new \Ease\Html\ATag($bookmark['url'],
                [new \Ease\TWB\GlyphIcon('bookmark'), ' '.$bookmark['title']]),
                ['class' => 'hitem']));
        }
    }

    /**
     * Add Css
     */
    function finalize()
    {
        $this->addCss('
            .hitem { background-color: #B5FFC4; margin: 5px; border-radius: 15px 50px 30px 5px; padding-left: 3px; padding-right: 10px; }
            #history { margin: 5px; }
            ');
        parent::finalize();
    }
}
