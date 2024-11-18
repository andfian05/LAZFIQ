<?php
function decodeWays($digits) {
    $n = strlen($digits);
    $result = [];

    // Fungsi rekursif untuk menemukan semua kombinasi
    function recursiveDecode($digits, $index, $current, &$result) {
        if ($index == strlen($digits)) {
            $result[] = $current;
            return;
        }

        // Ambil satu digit dan dekode
        $oneDigit = intval($digits[$index]);
        if ($oneDigit >= 1 && $oneDigit <= 9) {
            $char = chr($oneDigit - 1 + ord('A'));
            recursiveDecode($digits, $index + 1, $current . $char, $result);
        }

        // Ambil dua digit dan dekode
        if ($index + 1 < strlen($digits)) {
            $twoDigits = intval(substr($digits, $index, 2));
            if ($twoDigits >= 10 && $twoDigits <= 26) {
                $char = chr($twoDigits - 1 + ord('A'));
                recursiveDecode($digits, $index + 2, $current . $char, $result);
            }
        }
    }

    recursiveDecode($digits, 0, "", $result);
    return $result;
}

$digits = "1243752521494312";
$combinations = decodeWays($digits);

echo "Jumlah kombinasi: " . count($combinations) . "\n";
foreach ($combinations as $index => $combination) {
    echo "[$index] => $combination\n";
}
?>
