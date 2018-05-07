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
    public function __construct(int $spellId);

    public function castSpell(int $entityId, array $params = []);
    public function getSpellChance();
    public function getTriggerType();
}

