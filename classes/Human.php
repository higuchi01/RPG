<?php

class Human
{
    const MAX_HIT_POINT = 100;
    public $name;
    public $hitPoint = 100;
    public $attackPoint = 20;

    public function doAttack($enemy)
    {
        echo '「' . $this->name . '」の攻撃' . PHP_EOL;
        echo '「' . $enemy->name . '」に' . $this->attackPoint . 'のダメージ' . PHP_EOL;
        echo PHP_EOL;
        $enemy->tookDamage($this->attackPoint);
    }

    public function tookDamage($damage)
    {
        $this->hitPoint -= $damage;

        if ($this->hitPoint < 0) {
            $this->hitPoint = 0;
        }
    }
}
