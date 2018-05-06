<?php
/**
 * Created by PhpStorm.
 * User: uvale
 * Date: 06-May-18
 * Time: 09:47
 */

namespace Game\Spells;

use Game\Npc;

interface SpellInterface
{
    public function __construct(Npc &$npc, array $params = []);

    public function castSpell(Npc &$enemy = null, array $params = []);
    public function getSpellChance();
    public function getLuck();
    public function getTriggerType();
}

