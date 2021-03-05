<?php

class Enemy
{
    const MAX_HIT_POINT = 50;
    private string $name;
    private int $hitPoint = 50;
    private int $attackPoint = 10;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHitPoint(): int
    {
        return $this->hitPoint;
    }

    public function getAttackPoint(): int
    {
        return $this->attackPoint;
    }

    public function doAttack(object $brave): void
    {
        echo '「' . $this->getName() . '」の攻撃' . PHP_EOL;
        echo '「' . $brave->getName() . '」に' . $this->getAttackPoint() . 'のダメージ' . PHP_EOL;
        echo PHP_EOL;
        $brave->tookDamage($this->getAttackPoint());
    }

    public function tookDamage(int $damage): void
    {
        $this->hitPoint -= $damage;

        if ($this->hitPoint < 0) {
            $this->hitPoint = 0;
        }
    }
}
