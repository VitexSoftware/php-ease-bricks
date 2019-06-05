<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ease\ui;

/**
 * Description of SignInForm
 *
 * @author vitex
 */
class SignInForm extends \Ease\TWB\Form
{
    /**
     *
     * @var string
     */
    public $userNameField = 'username';
    /**
     *
     * @var string 
     */
    public $passwordField = 'password';

    public function __construct($formAction = null, $formMethod = 'post',
                                $tagProperties = null)
    {
        parent::__construct('SignIn', $formAction, $formMethod, null,
            $tagProperties);
        $this->addInput(new \Ease\Html\InputTextTag($this->userNameField),
            _('Username'), _('Login'));
        $this->addInput(new PasswordInput($this->passwordField),
            _('Password'), '');
    }

/**
 * Finally add subnut button
 */    
    public function finalize()
    {
        $this->addItem(new \Ease\TWB\SubmitButton(_('Sign In'), 'success',
            ['width' => '100%']));
        parent::finalize();
    }
    
}
