<?php
/**
 * Created by PhpStorm.
 * User: uvale
 * Date: 06-May-18
 * Time: 09:09
 */

namespace Game\Spells;

use Game\Npc;

abstract class SpellFactory{

    private static $currentSpellId = 0;
    private static $spells = [];

    static function getSpellById ($id){
        return isset(self::$spells[$id])?self::$spells[$id]:-1;
    }

    static function createSpell(string $type, array $params = [])
    {
        $spell = "Game\\Spells\\Spell" . str_replace('_','',ucwords($type," \t\r\n\f\v_"));

        if(class_exists($spell))
        {
            self::$spells[self::$currentSpellId] = new $spell(self::$currentSpellId);
            $spellId = self::$currentSpellId;
            self::$currentSpellId++;
            return $spellId;
        }
        else {
            throw new \Exception("Invalid spell type given.[".$spell."]");
        }
    }

}