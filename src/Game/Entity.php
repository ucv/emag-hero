<?php
/**
 * Created by PhpStorm.
 * User: uvale
 * Date: 06-May-18
 * Time: 07:18
 */

namespace Game;

use MathPHP\LinearAlgebra\Vector;

class Entity
{
    private $position;


    public function __construct()
    {
        $this->position = new Vector([0,0,0]);
    }

    /**
     * @return Vector
     */
    public function getPosition()
    {
        return $this->position;
    }



}