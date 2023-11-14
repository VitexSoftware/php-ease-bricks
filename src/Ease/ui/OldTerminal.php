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
        parent::__construct(new \Ease\Html\PreTag($content), $properties);
    }

    /**
     * Prepare CSS
     */
    public function finalize()
    {
        $this->addTagClass('OldTerminal');
        $this->addCSS('

.OldTerminal {
  background-color: black;
  background-image: radial-gradient(rgba(' . $this->red . ', ' . $this->green . ', ' . $this->blue . ', 0.75), black 120%);
  height: 100vh;
  margin: 0;
  overflow: hidden;
  padding: 2rem;
  color: white;
  font: 1.3rem Inconsolata, monospace;
  text-shadow: 0 0 5px #C8C8C8;
}
.OldTerminal::after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background: repeating-linear-gradient(0deg, rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0.15) 1px, transparent 1px, transparent 2px);
  pointer-events: none;
}

.OldTerminal::selection {
  background: #0080FF;
  text-shadow: none;
}

.OldTerminal pre {
  margin: 0;
}
');
        parent::finalize();
    }
}
