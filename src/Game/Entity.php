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
    protected $id;
    protected $position;

    public function __construct()
    {
        $this->position = new Vector([0,0,0]);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
}