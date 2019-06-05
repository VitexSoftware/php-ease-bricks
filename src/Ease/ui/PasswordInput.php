<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ease\ui;

/**
 * Description of PasswordInput
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class PasswordInput extends \Ease\Html\DivTag
{

    /**
     * Password input 
     * 
     * @param string $name       Input name
     * @param string $value      Plaintext password
     * @param array  $properties Poroperties for password input
     */
    public function __construct($name, $value = null, $properties = [])
    {
        $inpass = new \Ease\Html\InputPasswordTag($name, $value);
        $inpass->setTagID();
        $inpass->setTagProperties($properties);
        parent::__construct($inpass, ['class' => 'input-group']);
        $this->addItem(new \Ease\Html\SpanTag(null,
            ['id' => $inpass->getTagID().'eye', 'toggle' => '#password-field', 'class' => 'glyphicon glyphicon glyphicon-eye-open']));
        $this->addJavaScript('
$("#'.$inpass->getTagID().'eye").click(function() {
  $("#'.$inpass->getTagID().'eye").toggleClass("glyphicon-eye-open glyphicon-eye-close");
  var input = $("#'.$inpass->getTagID().'");
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
');
    }
}
