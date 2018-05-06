<?php
/**
 * Created by PhpStorm.
 * User: uvale
 * Date: 06-May-18
 * Time: 07:30
 */

use PHPUnit\Framework\TestCase;
use MathPHP\LinearAlgebra\Vector;
use Game\Entity;


class EntityTest extends TestCase
{
    public function testInnitialPositionIsZero():void
    {
        $entity = new Entity();
        $vector = new Vector([0,0,0]);

        $this->assertEquals($vector, $entity->getPosition());

    }
}
