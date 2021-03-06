<?php

declare(strict_types=1);

class Brave extends Human
{
    const MAX_HIT_POINT = 120;
    private int $hitPoint = self::MAX_HIT_POINT;
    private int $attackPoint = 30;

    public function __construct(string $name)
    {
        parent::__construct($name, $this->hitPoint, $this->attackPoint);
    }

    public function doAttack(object $enemy): void
    {
        if (rand(1, 3) === 1) {
            echo '「' . $this->getName() . '」のスキルが発動した' . PHP_EOL;
            echo '「' . $enemy->getName() . '」に' . $this->getAttackPoint() * 1.5 . 'の攻撃' . PHP_EOL;
            $enemy->tookDamage($this->getAttackPoint());
            echo PHP_EOL;
        } else {
            parent::doAttack($enemy);
        }
    }
}
