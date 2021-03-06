<?php

require_once('./classes/Human.php');
require_once('./classes/Brave.php');
require_once('./classes/BlackMage.php');
require_once('./classes/WhiteMage.php');
require_once('./classes/Enemy.php');

$members = [];
$members[] = new Brave('勇者');
$members[] = new BlackMage('黒魔道士');
$members[] = new WhiteMage('白魔道士');

$enemies = [];
$enemies[] = new Enemy('敵1', 50);
$enemies[] = new Enemy('敵2', 40);
$enemies[] = new Enemy('敵3', 40);

$turn = 1;
$isFinishFlg = false;

while (!$isFinishFlg) {
    echo '---' . $turn . 'ターン目---' . PHP_EOL;

    foreach ($members as $member) {
        echo '名前' . ' : ' . $member->getName() . PHP_EOL;
        echo 'HP' . ' : ' . $member->getHitPoint() . '/' . $member::MAX_HIT_POINT . PHP_EOL;
        echo PHP_EOL;
    }

    foreach ($enemies as $enemy) {
        echo '名前' . ' : ' . $enemy->getName() . PHP_EOL;
        echo 'HP' . ' : ' . $enemy->getHitPoint() . '/' . $enemy::MAX_HIT_POINT . PHP_EOL;
        echo PHP_EOL;
    }

    foreach ($members as $member) {
        $enemyIndex = rand(0, count($enemies) - 1);
        $enemy = $enemies[$enemyIndex];

        if (get_class($member) === 'WhiteMage') {
            $member->doAttackWhiteMage($enemy, $member);
        } else {
            $member->doAttack($enemy);
        }
    }

    foreach ($enemies as $enemy) {
        $memberIndex = rand(0, count($members) - 1);
        $member = $members[$memberIndex];

        $enemy->doAttack($member);
    }

    $deathCnt = 0;
    foreach ($members as $member) {
        if ($member->getHitPoint() === 0) {
            $deathCnt++;
        }
    }
    if ($deathCnt === count($members)) {
        $isFinishFlg = true;
        echo '*ゲームオーバー*' . PHP_EOL;
        break;
    }

    $deathCnt = 0;
    foreach ($enemies as $enemy) {
        if ($enemy->getHitPoint() === 0) {
            $deathCnt++;
        }
    }
    if ($deathCnt === count($enemies)) {
        $isFinishFlg = true;
        echo '*あなたの勝ちです*' . PHP_EOL;
        echo  PHP_EOL;
        break;
    }

    $turn++;
}

echo '戦闘終了' . PHP_EOL;

foreach ($members as $member) {
    echo '名前' . ' : ' . $member->getName() . PHP_EOL;
    echo 'HP' . ' : ' . $member->getHitPoint() . '/' . $member::MAX_HIT_POINT . PHP_EOL;
    echo PHP_EOL;
}

foreach ($enemies as $enemy) {
    echo '名前' . ' : ' . $enemy->getName() . PHP_EOL;
    echo 'HP' . ' : ' . $enemy->getHitPoint() . '/' . $enemy::MAX_HIT_POINT . PHP_EOL;
    echo PHP_EOL;
}
