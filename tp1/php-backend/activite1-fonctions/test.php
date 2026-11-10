<?php
declare(strict_types=1);

require_once __DIR__ . '/fonctions.php';


echo "12 + 8 = " . additionner(12, 8) . "<br>";
echo "12 - 8 = " . soustraire(12, 8) . "<br>";
echo "12 x 8 = " . multiplier(12, 8) . "<br>";
echo "12 / 8 = " . diviser(12, 8) . "<br>";
try {
    echo diviser(10, 0);
} catch (InvalidArgumentException $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
}


echo "7 est pair ? " . (estPair(7) ? "oui" : "non") . "<br>";
echo "10 est pair ? " . (estPair(10) ? "oui" : "non") . "<br>";
echo "-3 est positif ? " . (estPositif(-3) ? "oui" : "non") . "<br>";
echo "maximum(4, 9, 2) = " . estmaximum(4, 9, 2) . "<br>";
echo "maximumNatif(4, 9, 2) = " . estmax(4, 9, 2) . "<br>";
foreach ([1, 2, 17, 18, 97] as $n) {
    echo "$n est premier ? " . (estPremier($n) ? "oui" : "non") . "<br>";
}


echo "100 HT -> TTC = " . calculerTTC(100) . "<br>";
echo "100 HT -> TTC (10 %) = " . calculerTTC(100, 10) . "<br>";
echo "Remise 20 % sur 250 = " . calculerRemise(250, 20) . "<br>";
$montant = calculerFacture(100, 10, 10, 20);
echo "Facture : " . number_format($montant, 2, ",", " ") . " MAD" . "<br>";


echo "Moyenne(12, 15, 9) = " . round(moyenne(12, 15, 9), 2) . "<br>";
echo "Moyenne() = " . moyenne() . "<br>";
echo "Aire cercle r=5 : " . aireCercle(5) . "<br>";
echo "Perimetre cercle r=5 : " . perimetreCercle(5) . "<br>";
echo "25 C = " . celsiusVersFahrenheit(25) . " F" . "<br>";
echo "77 F = " . fahrenheitVersCelsius(77) . " C" . "<br>";
echo "1000 MAD = " . convertirDevise(1000, 0.092) . " EUR" . "<br>";


echo "5! = " . factorielle(5) . "<br>";
try {
    factorielle(-1);
} catch (InvalidArgumentException $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
}
echo "Fibonacci(8) : " . implode(", ", fibonacci(8)) . "<br>";
echo "PGCD(48, 18) = " . pgcd(48, 18) . "<br>";
echo "2^10 (boucle) = " . puissance(2, 10) . "<br>";
echo "2^10 (recursif) = " . puissanceRecursive(2, 10) . "<br>";
