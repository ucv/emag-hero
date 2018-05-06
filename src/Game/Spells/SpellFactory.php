<?php
/**
 * Created by PhpStorm.
 * User: uvale
 * Date: 06-May-18
 * Time: 09:09
 */

namespace Game\Spells;

use Game\Npc;

class SpellFactory{

    static function createSpell(string $type, Npc &$npc, array $params = [])
    {
        $spell = "Game\\Spells\\Spell_" . str_replace('_','',ucwords($type," \t\r\n\f\v_"));

        if(class_exists($spell))
        {
            return new $spell($npc,$params);
        }
        else {
            throw new \Exception("Invalid spell type given.[".$spell."]");
        }
    }

}