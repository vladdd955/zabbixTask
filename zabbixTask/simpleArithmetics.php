<?php


$num1 = readline("Enter a number!: ");
$digitsCount = strlen($num1);
while ($digitsCount > 500) {
    echo "Error: number has more than 500 digits.\n";
    $num1 = readline("Enter a number: ");
    $digitsCount = strlen($num1);
}

while (!is_numeric($num1)) {
    echo "Wrong input, please enter here number\n";
    $num1 = readline("Enter a number: ");
}
while ($num1 <= 0) {
    echo "First number can't be negative or equal 0\n";
    $num1 = readline("Enter a number: ");
}

$num2 = readline("Enter another number: ");
$digitsCount = strlen($num2);

while ($digitsCount > 500) {
    echo "Error: number has more than 500 digits.\n";
    $num2 = readline("Enter a number: ");
    $digitsCount = strlen($num2);
}

while (!is_numeric($num2)) {
    echo "Wrong input, please enter here number\n";
    $num2 = readline("Enter a number: ");
}

while ($num2 <= 0) {
    echo "Second number can't be negative or equal 0\n";
    $num2 = readline("Enter a number: ");
}


$operator = readline("Enter operator: ");


while (!$operator == "-" || !$operator == "+" || !$operator == "*" || is_numeric($operator)) {
    echo "Wrong operator\n";
    $operator = readline("Enter please -> - ; -> + ; -> * : ");
}


if ($operator == "-") {
    while ($num2 > $num1) {
        echo "Second number can't be bigger than first number\n";
        $num2 = readline("Enter a number: ");
    }
}

$justNum = $operator . $num2;
$digitsCount = strlen($justNum) - 1;
$digitCount2 = strlen($num1);


if ($digitsCount >= $digitCount2) {
    echo " " . $num1 . "\n" . str_pad($justNum, strlen($num1), " ", STR_PAD_LEFT) . "\n";
} else {
    echo $num1 . "\n" . str_pad($justNum, strlen($num1), " ", STR_PAD_LEFT) . "\n";
}

echo str_pad("", strlen($num1), "-") . "\n";

$result = 0;

if ($operator == "+") {
    if ($digitsCount >= $digitCount2) {
        $result = $num1 + $num2;
        echo str_pad(" " . $result, strlen($num1)) . "\n";
    } else {
        $result = $num1 + $num2;
        echo str_pad("" . $result, strlen($num1)) . "\n";
    }

} elseif ($operator == "-") {
    if ($digitsCount >= $digitCount2) {
        $result = $num1 + $num2;
        echo str_pad(" " . $result, strlen($num1)) . "\n";
    } else {
        $result = $num1 + $num2;
        echo str_pad("" . $result, strlen($num1)) . "\n";
    }
} elseif ($operator == "*") {
    echo multiply($num1, $num2);
}


function multiply(string $num1, string $num2): string
{

    for ($i = strlen($num2) - 1; $i >= 0; $i--) {
        $carry = 0;
        $line = "   ";
        for ($j = strlen($num1) - 1; $j >= 0; $j--) {
            $temp = intval($num2[$i]) * intval($num1[$j]) + $carry;
            $line .= $temp % 10;
            $carry = intval($temp / 10);
        }
        $line .= $carry;
        echo strrev($line) . "\n";
        for ($k = 0; $k < strlen($num2) - $i - 1; $k++) {
            echo " ";
        }
    }
    return str_pad("", strlen($num1), "-") . "\n" . $num1 * $num2 . "\n";
}