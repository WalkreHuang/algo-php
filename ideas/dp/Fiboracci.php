<?php
function fib($i) {
    if ($i < 1) {
        return 0;
    }

    if ($i == 1 || $i== 2) {
        return 1;
    }

    return fib($i-1) + fib($i-2);
}
$time1 = time();
echo fib(40).PHP_EOL;
$time2 = time().PHP_EOL;

echo 'consume time:'.($time2-$time1).'s';

//带记忆的递归
function fibWithMem($i) {
    if ($i < 1) {
        return 0;
    }
    $note = [0];

    return help($i, $note);
}

function help($i, &$note) {
    if ($i == 1 || $i == 2) {
        return 1;
    }
    //是否已经计算过
    if (isset($note[$i])) {
        return $note[$i];
    }

    $note[$i] = help($i-1, $note) + help($i-2, $note);

    return $note[$i];
}

$time1 = time();
echo fibWithMem(40).PHP_EOL;
$time2 = time().PHP_EOL;

echo 'consume time:'.($time2-$time1).'s';

function fibWithDp($n) {
    $dp = [];
    $dp[1] = $dp[2] = 1;

    for ($i = 3;$i<=$n;$i++) {
        $dp[$i] = $dp[$i-1] + $dp[$i-2];
    }

    return $dp[$n];
}

$time1 = time();
echo fibWithDp(40).PHP_EOL;
$time2 = time().PHP_EOL;

echo 'consume time:'.($time2-$time1).'s';

function fibWithDpSpace($n) {
    if ($n < 1) {
        return 0;
    }
    if ($n == 1 || $n == 2) {
        return 1;
    }
    $pre = 1;
    $cur = 1;

    for ($i = 3;$i<=$n;$i++) {
        $sum = $cur + $pre;

        $pre = $cur;
        $cur = $sum;
    }

    return $cur;
}