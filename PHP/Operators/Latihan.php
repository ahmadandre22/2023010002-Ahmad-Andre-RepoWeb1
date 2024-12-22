<?php
// Operator Aritmatika
echo "Belajar Operator PHP\n";
echo "Operator Aritmatika\n";
echo "5 + 10 = " . (5 + 10) . "\n";
echo "5 - 10 = " . (5 - 10) . "\n";
echo "5 * 10 = " . (5 * 10) . "\n";
echo "5 / 10 = " . (5 / 10) . "\n";
echo "5 % 10 = " . (5 % 10) . "\n";
echo "5 ** 10 = " . (5 ** 10) . "\n";
echo "-a = " . (-5) . "\n\n";

// Operator Penugasan
echo "Operator Penugasan\n";

$a = 15;
echo "int(" . $a . ")\n";

$a = 5;
$a *= -1; // Mengubah $a menjadi -5
echo "int(" . $a . ")\n";

$a = -500;
echo "int(" . $a . ")\n";

$a = -50;
echo "int(" . $a . ")\n";


// Operator Perbandingan
echo "Operator Perbandingan\n";
echo "90 > 80 = " . var_export(90 > 80, true) . "\n";
echo "3 >= 3 = " . var_export(3 >= 3, true) . "\n";
echo "3 < 6 = " . var_export(3 < 6, true) . "\n";
echo "5 <= 3 = " . var_export(5 <= 3, true) . "\n";
echo "'a' < 'b' = " . var_export('a' < 'b', true) . "\n";
echo "'abc' < 'b' = " . var_export('abc' < 'b', true) . "\n";
?>
