<?php


function possible(array $stalls, int $minDistance, int $k): bool
{
    $cows = 1;
    $lastCowPosition = $stalls[0];
    for ($i = 1; $i < count($stalls); $i++) {
        if ($stalls[$i] - $lastCowPosition >= $minDistance) {
            $cows++;
            $lastCowPosition = $stalls[$i];
            if ($cows >= $k) {
                return true;
            }
        }
    }
    return false;
}

function aggressiveCows(array $stalls, int $k): int
{
    $n = count($stalls);
    sort($stalls);
    $low = 1;
    $high = $stalls[$n - 1] - $stalls[0];
    $result = 0;
    while ($low <= $high) {
        $mid = intval(($low + $high) / 2);
        if (possible($stalls, $mid, $k)) {
            $result = $mid;
            $low = $mid + 1;
        } else {
            $high = $mid - 1;
        }
    }
    return $result;
}

$stalls = [1, 2, 8, 4, 9];
$k = 3;

echo aggressiveCows($stalls, $k) . "\n";
