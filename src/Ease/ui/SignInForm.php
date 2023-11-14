<?php

/**
 * EasePHP Bricks - SignIn form.
 *
 * @author     Vítězslav Dvořák <vitex@arachne.cz>
 * @copyright  2016-2020 Vitex Software
 */

namespace Ease\ui;

use Ease\Html\Form;
use Ease\Html\InputTextTag;
use Ease\Html\SubmitButton;

/**
 * Description of SignInForm
 *
 * @author vitex
 */
class SignInForm extends Form
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

    public function __construct(
        $formAction = null,
        $formMethod = 'post',
        $tagProperties = null
    ) {
        parent::__construct(
            'SignIn',
            $formAction,
            $formMethod,
            null,
            $tagProperties
        );
        $this->addInput(
            new InputTextTag($this->userNameField),
            _('Username'),
            _('Login')
        );
        $this->addInput(
            new PasswordInput($this->passwordField),
            _('Password'),
            ''
        );
    }

    /**
     * Finally add subnut button
     */
    public function finalize()
    {
        $this->addItem(new SubmitButton(
            _('Sign In'),
            'success',
            ['width' => '100%']
        ));
        parent::finalize();
    }
}
