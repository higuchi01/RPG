<?php

require_once('./classes/Human.php');
require_once('./classes/Enemy.php');

$human = new Human();
$enemy = new Enemy();

$human->name = '人間';
$enemy->name = '敵';

$turn = 1;

while ($human->hitPoint > 0 && $enemy->hitPoint > 0) {
    echo '---' . $turn . 'ターン目---' . PHP_EOL;

    echo '名前' . ' : ' . $human->name . PHP_EOL;
    echo 'HP' . ' : ' . $human->hitPoint . '/' . $human::MAX_HIT_POINT . PHP_EOL;
    echo PHP_EOL;
    echo '名前' . ' : ' . $enemy->name . PHP_EOL;
    echo 'HP' . ' : ' . $enemy->hitPoint . '/' . $enemy::MAX_HIT_POINT . PHP_EOL;
    echo PHP_EOL;

    $human->doAttack($enemy);
    $enemy->doAttack($human);

    $turn++;
}

echo '戦闘終了';

echo '名前' . ' : ' . $human->name . PHP_EOL;
echo 'HP' . ' : ' . $human->hitPoint . '/' . $human::MAX_HIT_POINT . PHP_EOL;
echo PHP_EOL;
echo '名前' . ' : ' . $enemy->name . PHP_EOL;
echo 'HP' . ' : ' . $enemy->hitPoint . '/' . $enemy::MAX_HIT_POINT . PHP_EOL;
echo PHP_EOL;
