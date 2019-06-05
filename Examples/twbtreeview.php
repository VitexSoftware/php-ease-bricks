<?php
/**
 * EasePHPbricks - TwitterBootstrap Switch example
 *
 * 
 * @author     Vítězslav Dvořák <vitex@arachne.cz>
 * @copyright  2016 Vitex Software
 */

namespace Ease;

include '../vendor/autoload.php';



$oPage = new TWB\WebPage('TWB TreeView - EasePHP Bricks ');

$oPage->addJavaScript('
    function getTree() {

var tree = [
  {
    text: "Parent 1",
    nodes: [
      {
        text: "Child 1",
        nodes: [
          {
            text: "Grandchild 1"
          },
          {
            text: "Grandchild 2"
          }
        ]
      },
      {
        text: "Child 2"
      }
    ]
  },
  {
    text: "Parent 2"
  },
  {
    text: "Parent 3"
  },
  {
    text: "Parent 4"
  },
  {
    text: "Parent 5"
  }
];
  return tree;
}
');

$oPage->addItem( new TWB\Container(new ui\TWBTreeView('trname', 'data: getTree()')) );

$oPage->draw();
