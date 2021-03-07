<?php

class Message
{
    public function displayStatusMessage($objects)
    {
        foreach ($objects as $object) {
            echo $object->getName() . ' : ' . $object->getHitPoint() . ' / ' . $object::MAX_HIT_POINT . PHP_EOL;
            echo PHP_EOL;
        }
    }

    public function displayAttackMessage($objects, $targets)
    {
        foreach ($objects as $object) {
            if (get_class($object) === 'WhiteMage') {
                $object->doAttackWhiteMage($targets, $objects);
            } else {
                $object->doAttack($targets);
            }
        }
    }
}
