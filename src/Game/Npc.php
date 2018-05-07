<?php
/**
 * Created by PhpStorm.
 * User: uvale
 * Date: 06-May-18
 * Time: 08:48
 */

namespace Game;


use Game\Spells\Spell;
use Game\Spells\SpellFactory;
use Game\Spells\SpellInterface;

class Npc extends Entity
{
    protected $name;

    protected $health;
    protected $strength;
    protected $defence;
    protected $speed;
    protected $luck;

    protected $spells;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Npc
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function isAlive(){
        return $this->getHealth() > 0 ? true:false;
    }

    /**
     * @return mixed
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @param mixed $health
     * @return Npc
     */
    public function setHealth($health)
    {
        $this->health = $health>0?$health:0;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @param mixed $strength
     * @return Npc
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDefence()
    {
        return $this->defence;
    }

    /**
     * @param mixed $defence
     * @return Npc
     */
    public function setDefence($defence)
    {
        $this->defence = $defence;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * @param mixed $speed
     * @return Npc
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;
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
     * @return Npc
     */
    public function setLuck($luck)
    {
        $this->luck = $luck;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSpells()
    {
        return isset($this->spells)?$this->spells:[];
    }

    public function learnSpell(string $spellName){
        $this->spells[] = SpellFactory::createSpell($spellName);
        return $this;
    }

    public function takeDamage($amount){
        $damage = abs($this->getDefence() - $amount);
        $dodgeRoll = rand(0, 100);
        if($this->getLuck() <= $dodgeRoll){
            if($damage > 0){
                /** @var SpellInterface $spell */
                foreach ($this->getSpells() as $spell){
                    /** @var SpellInterface $spell */
                    $spell = SpellFactory::getSpellById($spell);
                    if($spell->getTriggerType() == Spell::TRIGGER_ON_TAKE_DAMAGE){
                        $damage = $spell->castSpell($this->getId(),['damage' => $damage]);
                    }
                }
                $this->setHealth($this->getHealth() - $damage);
            }
        }else{
            echo $this->getName() . ' dodged['.$dodgeRoll.'] the attack.'.PHP_EOL;
        }

        return $damage;
    }

    public function attack(int $entityId){
        $damage = $this->getStrength();
        $enemy = Entity::getEntityById($entityId);
        /** @var SpellInterface $spell */
        foreach ($this->getSpells() as $spell){
            $spell = SpellFactory::getSpellById($spell);
            if($spell->getTriggerType() == Spell::TRIGGER_ON_ATTACK){
                $damage = $spell->castSpell($entityId,['damage' => $damage]);
            }
        }
        //Damage = Attacker strength - Defender defence
        return $enemy->takeDamage($damage);
    }
}