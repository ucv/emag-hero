<?php
/**
 * Created by PhpStorm.
 * User: uvale
 * Date: 06-May-18
 * Time: 09:47
 */

namespace Game\Spells;

use Game\Npc;

class Spell{

    const TRIGGER_ON_TAKE_DAMAGE=0;
    const TRIGGER_ON_ATTACK=1;

    const RAPID_STRIKE='rapid_strike';
    const MAGIC_SHIELD='magic_shield';

    private $id;
    private $name;
    private $description;
    private $luck;

    private $triggerType;



    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Spell
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return Spell
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLuck()
    {
        return $this->luck;
    }

    /**
     * @param mixed $luck
     * @return Spell
     */
    public function setLuck($luck)
    {
        if($luck < 0 || $luck > 100){
            throw new Exception("Invalid luck values given!");
        }

        $this->luck = $luck;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTriggerType()
    {
        return $this->triggerType;
    }

    /**
     * @param mixed $triggerType
     * @return Spell
     */
    public function setTriggerType($triggerType)
    {
        $this->triggerType = $triggerType;
        return $this;
    }
}