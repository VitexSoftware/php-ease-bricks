<?php

declare(strict_types=1);

/**
 * Thanks to https://css-tricks.com/old-timey-terminal-styling/
 *
 * @author     Vítězslav Dvořák <info@vitexsoftware.cz>
 * @copyright  2023 Vitex Software
 */

namespace Ease\ui;

/**
 * Description of OldTerminal
 *
 * @author vitex
 */
class OldTerminal extends \Ease\Html\DivTag
{
    /**
     * @var int background red color
     */
    public $red = 0;

    /**
     * @var int background green color
     */
    public $green = 150;

    /**
     * @var int background blue color
     */
    public $blue = 0;

/**
 * @var string font color
 */
    public $color = 'white';

    /**
     * Old Style Terminal Div
     *
     * @param mixed $content
     * @param array $properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct(null, $properties);
        $this->addItem(new \Ease\Html\DivTag(new \Ease\Html\PreTag(new \Ease\Html\PairTag('output', [], $content), ['class' => 'console']), ['class' => 'faint','style' => 'z-index: 9']));
        if (empty($this->getTagID())) {
            $this->setTagID();
        }
    }

    /**
     * Prepare CSS
     */
    public function finalize()
    {

        $this->addTagClass('OldTerminal');
        $this->addCSS('

#' . $this->getTagID() . ' {
  background-color: black;
  background-image: radial-gradient(rgba(' . $this->red . ', ' . $this->green . ', ' . $this->blue . ', 0.75), black 120%);
  margin: 0;
  padding: 0;
  overflow: hidden;
  color: ' . $this->color . ';
  font: 1.3rem Inconsolata, monospace;
  text-shadow: 0 0 5px #C8C8C8;
}
#' . $this->getTagID() . ' .faint {
  margin: 0;
  paddig: 0;
  display: block;
  height: 100%;
  width: 100%;
  background: repeating-linear-gradient(0deg, rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0.15) 1px, transparent 1px, transparent 2px);
  pointer-events: none;
}

#' . $this->getTagID() . '::selection {
  background: #0080FF;
  text-shadow: none;
}

#' . $this->getTagID() . ' pre {
  margin: 0;
}
');
        parent::finalize();
    }

    /**
     * Set Background Red Color Value
     *
     * @param int $color 0-255
     *
     * @return self
     */
    public function setBackRed(int $color)
    {
        $this->red = $color;
        return $this;
    }

    /**
     * Set Background Green Color Value
     *
     * @param int $color 0-255
     *
     * @return self
     */
    public function setBackGreen(int $color)
    {
        $this->green = $color;
        return $this;
    }

    /**
     * Set Background Blue Color Value
     *
     * @param int $color 0-255
     *
     * @return self
     */
    public function setBlue(int $color)
    {
        $this->blue = $color;
        return $this;
    }

    /**
     * Set Font Color Value
     *
     * @param string $color color code or name
     *
     * @return self
     */
    public function setFontColor(string $color)
    {
        $this->color = $color;
        return $this;
    }
}
