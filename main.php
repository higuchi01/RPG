<?php

require_once('./classes/Human.php');
require_once('./classes/Brave.php');
require_once('./classes/BlackMage.php');
require_once('./classes/WhiteMage.php');
require_once('./classes/Enemy.php');
require_once('./classes/Message.php');

$members = [];
$members[] = new Brave('勇者');
$members[] = new BlackMage('黒魔道士');
$members[] = new WhiteMage('白魔道士');

$enemies = [];
$enemies[] = new Enemy('敵1', 50);
$enemies[] = new Enemy('敵2', 40);
$enemies[] = new Enemy('敵3', 40);

$messageObj = new Message();

$turn = 1;
$isFinishFlg = false;

while (!$isFinishFlg) {
    echo '---' . $turn . 'ターン目---' . PHP_EOL;

    $messageObj->displayStatusMessage($members);
    $messageObj->displayStatusMessage($enemies);

    $messageObj->displayAttackMessage($members, $enemies);
    $messageObj->displayAttackMessage($enemies, $members);

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

$messageObj->displayStatusMessage($members);
$messageObj->displayStatusMessage($enemies);
