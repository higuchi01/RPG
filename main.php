<?php

require_once('./classes/Human.php');
require_once('./classes/Brave.php');
require_once('./classes/Enemy.php');

$brave = new Brave('勇者');
$enemy = new Enemy('敵');

$turn = 1;

while ($brave->getHitPoint() > 0 && $enemy->getHitPoint() > 0) {
    echo '---' . $turn . 'ターン目---' . PHP_EOL;

    echo '名前' . ' : ' . $brave->getName() . PHP_EOL;
    echo 'HP' . ' : ' . $brave->getHitPoint() . '/' . $brave::MAX_HIT_POINT . PHP_EOL;
    echo PHP_EOL;
    echo '名前' . ' : ' . $enemy->getName() . PHP_EOL;
    echo 'HP' . ' : ' . $enemy->getHitPoint() . '/' . $enemy::MAX_HIT_POINT . PHP_EOL;
    echo PHP_EOL;

    $brave->doAttack($enemy);
    $enemy->doAttack($brave);

    $turn++;
}

echo '戦闘終了' . PHP_EOL;

echo '名前' . ' : ' . $brave->getName() . PHP_EOL;
echo 'HP' . ' : ' . $brave->getHitPoint() . '/' . $brave::MAX_HIT_POINT . PHP_EOL;
echo PHP_EOL;
echo '名前' . ' : ' . $enemy->getName() . PHP_EOL;
echo 'HP' . ' : ' . $enemy->getHitPoint() . '/' . $enemy::MAX_HIT_POINT . PHP_EOL;
echo PHP_EOL;
