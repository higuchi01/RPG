<?php

declare(strict_types=1);

class Human
{
    const MAX_HIT_POINT = 100;
    private string $name;
    private int $hitPoint = 100;
    private int $attackPoint = 20;

    public function __construct(string $name, int $hitPoint, int $attackPoint)
    {
        $this->name = $name;
        $this->hitPoint = $hitPoint;
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

    public function doAttack(array $enemies)
    {
        if ($this->getHitPoint() <= 0) {
            return false;
        }

        $enemyIndex = rand(0, count($enemies) - 1);
        $enemy = $enemies[$enemyIndex];

        echo '「' . $this->getName() . '」の攻撃' . PHP_EOL;
        echo '「' . $enemy->getName() . '」に' . $this->getAttackPoint() . 'のダメージ' . PHP_EOL;
        echo PHP_EOL;
        $enemy->tookDamage($this->getAttackPoint());
    }

    public function tookDamage(int $damage): void
    {
        $this->hitPoint -= $damage;

        if ($this->getHitPoint() < 0) {
            $this->hitPoint = 0;
        }
    }

    public function recoveryDamage(int $heal, object $member): void
    {
        $member->hitPoint += $heal;

        if ($this->getHitPoint() > $member::MAX_HIT_POINT) {
            $this->hitPoint = $member::MAX_HIT_POINT;
        }
    }
}
