<?php
function generateCombinations($digits, $current = "", $index = 0, &$result = []) {
    $length = strlen($digits);

    if ($index == $length) {
        $result[] = $current;
        return;
    }

    // Convert Satu Digit
    $num1 = (int)$digits[$index];
    if ($num1 >= 1 && $num1 <= 9) {
        $char1 = chr($num1 + 64); // 1 -> A, 2 -> B, ..., 9 -> I
        generateCombinations($digits, $current . $char1, $index + 1, $result);
    }

    // Convert 2 Digit
    if ($index + 1 < $length) {
        $num2 = (int)substr($digits, $index, 2);
        if ($num2 >= 10 && $num2 <= 26) {
            $char2 = chr($num2 + 64); // 10 -> J, 11 -> K, ..., 26 -> Z
            generateCombinations($digits, $current . $char2, $index + 2, $result);
        }
    }
}

// Deklasi Digit
$digits = "1243752521494312";


$result = [];
generateCombinations($digits, "", 0, $result);

// Cetak Hasilnya
echo "Jumlah kombinasi: " . count($result) . "\n";
foreach ($result as $key => $combination) {
    echo "[" . $key . "] => " . $combination . "\n";
}
?>
