<?php

declare(strict_types=1);

class Enemy
{
    const MAX_HIT_POINT = 50;
    private string $name;
    private int $hitPoint = 50;
    private int $attackPoint = 10;

    public function __construct(string $name, int $attackPoint)
    {
        $this->name = $name;
        $this->attackPoint = $attackPoint;
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

    public function doAttack(array $members)
    {
        if ($this->getHitPoint() <= 0) {
            return false;
        }

        $memberIndex = rand(0, count($members) - 1);
        $member = $members[$memberIndex];

        echo '「' . $this->getName() . '」の攻撃' . PHP_EOL;
        echo '「' . $member->getName() . '」に' . $this->getAttackPoint() . 'のダメージ' . PHP_EOL;
        echo PHP_EOL;
        $member->tookDamage($this->getAttackPoint());
    }

    public function tookDamage(int $damage): void
    {
        $this->hitPoint -= $damage;

        if ($this->hitPoint < 0) {
            $this->hitPoint = 0;
        }
    }
}
