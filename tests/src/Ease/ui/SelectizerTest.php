<?php

namespace Test\Ease\ui;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2018-09-18 at 11:23:39.
 */
class SelectizerTest extends \PHPUnit\Framework\TestCase {

    /**
     * @var History
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        if (class_exists('SelTest') === false) {

            class SelTest extends \Ease\Html\SelectTag {

                use \Ease\ui\Selectizer;
            }

        }
        $this->object = new SelTest();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers Ease\ui\History::finalize
     */
    public function testSelectize() {
        $this->object->selectize();
        $this->assertEquals();
    }

}
