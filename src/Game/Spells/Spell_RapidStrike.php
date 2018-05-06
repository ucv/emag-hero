<?php
/**
 * Created by PhpStorm.
 * User: uvale
 * Date: 06-May-18
 * Time: 09:48
 */
namespace Game\Spells;

use Game\Npc;

class Spell_RapidStrike extends Spell implements SpellInterface {

    public function __construct(Npc &$npc, array $params = [])
    {
        $this->setNpc($npc);
        $this->setName('Rapid Strike');
        $this->setDescription('Strike twice while it\'s his turn to attack, there\'s a 10% he\'ll use this skill every time he attacks');
        $this->setLuck(10);
    }

    public function castSpell(Npc &$enemy = null, array $params = [])
    {
        if($enemy != null){
            $enemy->takeDamage($this->getNpc()->getStrength());
            $enemy->takeDamage($this->getNpc()->getStrength());
        }
    }

    public function getSpellChance()
    {
        parent::getLuck();
    }
}