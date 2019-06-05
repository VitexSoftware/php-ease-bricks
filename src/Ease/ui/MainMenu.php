<?php
/**
 * EaseBricks - Main menu.
 *
 * @author     Vítězslav Dvořák <vitex@arachne.cz>
 * @copyright  2015 Spoje.Net
 */

namespace Ease\ui;

class MainMenu extends \Ease\Html\NavTag
{

    /**
     * Vytvoří hlavní menu.
     */
    public function __construct()
    {
        parent::__construct(null, ['id' => 'MainMenu']);
    }

    /**
     * Vložení menu.
     */
    public function afterAdd()
    {
        $nav    = $this->addItem(new BootstrapMenu());
        $user   = \Ease\Shared::user();
        $userID = \Ease\Shared::user()->getUserID();

        switch (get_class($user)) {
            case 'SpojeNet\System\User': //Admin
                $nav->addMenuItem(new NavBarSearchBox('search', 'search.php'));
                $nav->addDropDownMenu('<img width=30 src=images/gear.svg> '._('Scripts'),
                    [
                        'invoicematch.php' => \Ease\TWB\Part::GlyphIcon('piggy-bank').' '._('Invoice matching (Take so long)'),
//                'invoice2flexibee.php' => \Ease\TWB\Part::GlyphIcon('plus') . '&nbsp;' . _('Faktury do Flexibee'),
//                'address2flexibee.php' => \Ease\TWB\Part::GlyphIcon('plus') . '&nbsp;' . _('Adresář do Flexibee'),
                    ]
                );
                $nav->addDropDownMenu('<img width=30 src=images/contract_150.png> '._('Oders'),
                    array_merge([
                    'contracttodo.php' => new \Ease\Html\ImgTag('images/copying.svg',
                        'TODO', ['height' => '20px']).'&nbsp; '._('Orders TODO'),
//                    'zavazky.php' => \Ease\TWB\Part::GlyphIcon('transfer').' '._('Měsíční závazky'),
//                    'pohledavky.php' => \Ease\TWB\Part::GlyphIcon('transfer').' '._('Měsíční pohledávky'),
//                    'contract-reset.php' => \Ease\TWB\Part::GlyphIcon('repeat').' '._('Reset autogenerace'),
//                    'contract.php' => \Ease\TWB\Part::GlyphIcon('plus').' '._('Nová smlouva'),
//                    'contracts.php' => \Ease\TWB\Part::GlyphIcon('list').'&nbsp;'._('Přehled smluv'),
//                    'rspcntrcts.php' => \Ease\TWB\Part::GlyphIcon('user').'&nbsp;'._('Respondenti'),
                    ])
                );
                $nav->addDropDownMenu('<img width=30 src=images/order.svg> '._('Proposal'),
                    [
                        'adminpricelist.php' => \Ease\TWB\Part::GlyphIcon('th-list').' '._('Pricelist'),
                    ]
                );

                $nav->addDropDownMenu('<img width=30 src=images/users_150.png> '._('Users'),
                    array_merge([
                    'createaccount.php' => \Ease\TWB\Part::GlyphIcon('plus').' '._('New user'),
                    'users.php' => \Ease\TWB\Part::GlyphIcon('list').'&nbsp;'._('User overview'),
                    '' => '',
                        ], $this->getMenuList(\Ease\Shared::user(), 'user'))
                );
                break;
            case 'SpojeNet\System\Customer': //Customer
                $nav->addMenuItem(new \Ease\Html\ATag('pricelist.php',
                        '<img width=30 src=images/cennik.png> '._('Pricelist')));

                $subregId = $user->adresar->getExternalID('subreg');
                $ipexId   = $user->adresar->getExternalID('ipex');
                $lmsId    = $user->adresar->getExternalID('lms.cstmr');

                if ($subregId || $ipexId) {
                    $productsMenuItems = [];
                    if ($ipexId) {
                        $productsMenuItems['voip.php'] = \Ease\TWB\Part::GlyphIcon('th-list').' '._('VoIP');
                    }
                    if ($subregId) {
                        $productsMenuItems['dns.php'] = \Ease\TWB\Part::GlyphIcon('th-list').' '._('Domains');
                    }
                    $nav->addDropDownMenu('<img width=30 src=images/products.svg> '._('Products'),
                        $productsMenuItems);
                }

                if ($lmsId) {
                    $statsMenuItems['isp.php'] = \Ease\TWB\Part::GlyphIcon('th-list').' '._('Traffic');
                    $nav->addDropDownMenu('<img width=30 src=images/stats.svg> '._('Stats'),
                        $statsMenuItems);
                }

                $nav->addDropDownMenu('<img width=30 src=images/order.svg> '._('Orders'),
                    [
                        'orderform.php' => \Ease\TWB\Part::GlyphIcon('plus').' '._('New order'),
//                    'pricelist.php' => \Ease\TWB\Part::GlyphIcon('th-list').' '._('Pricelist'),
                        'myorders.php' => \Ease\TWB\Part::GlyphIcon('list').'&nbsp;'._('My orders')]
                );

                break;
            case 'Ease\Anonym': //Anonymous
            default:
                break;
        }
    }

    /**
     * Přidá do stránky javascript pro skrývání oblasti stavových zpráv.
     */
    public function finalize()
    {
        $this->addCss('body {
                padding-top: 60px;
                padding-bottom: 40px;
            }');

        \Ease\JQuery\Part::jQueryze($this);
        \Ease\Shared::webPage()->addCss('.dropdown-menu { overflow-y: auto } ');
        \Ease\Shared::webPage()->addJavaScript("$('.dropdown-menu').css('max-height',$(window).height()-100);",
            null, true);
        $this->includeJavaScript('js/slideupmessages.js');
    }
}
