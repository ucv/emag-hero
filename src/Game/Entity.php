<?php
/**
 * Created by PhpStorm.
 * User: uvale
 * Date: 06-May-18
 * Time: 07:18
 */

namespace Game;

//use MathPHP\LinearAlgebra\Vector;

abstract class Entity
{
    private static $currentEntityId = 0;
    private static $entities = [];

    public static function getEntityById(int $id){
        return isset(self::$entities[$id])?self::$entities[$id]:-1;
    }

    private $id;
//    protected $position;

    public final function __construct()
    {
        $this->setId(self::$currentEntityId);
        self::$entities[self::$currentEntityId] = $this;
        self::$currentEntityId++;
//        $this->position = new Vector([0,0,0]);

        return $this->getId();
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
    private function setId($id): void
    {
        $this->id = $id;
    }
}