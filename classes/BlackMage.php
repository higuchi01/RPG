<?php

declare(strict_types=1);

class BlackMage extends Human
{
    const MAX_HIT_POINT = 80;
    private int $hitPoint = self::MAX_HIT_POINT;
    private int $attackPoint = 10;
    private int $intelligence = 30;

    public function __construct(string $name)
    {
        parent::__construct($name, $this->hitPoint, $this->attackPoint);
    }

    public function doAttack(array $enemies)
    {
        if ($this->getHitPoint() <= 0) {
            return false;
        }

        $enemyIndex = rand(0, count($enemies) - 1);
        $enemy = $enemies[$enemyIndex];

        if (rand(1, 2) === 1) {
            echo '「' . $this->getName() . '」のスキルが発動' . PHP_EOL;
            echo '「' . $enemy->getName() . '」に' . $this->intelligence . 'のダメージ' . PHP_EOL;
            echo PHP_EOL;
            $enemy->tookDamage($this->intelligence);
        } else {
            parent::doAttack($enemies);
        }
    }
}
