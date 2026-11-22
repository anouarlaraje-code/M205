<?php
declare(strict_types=1);

$notes   = [12, 15, 8, 17, 9, 14, 11];
$prenoms = ['Sara', 'Youssef', 'Imane', 'Omar', 'Khadija'];

$notesInitiales = $notes;

function titre(string $t): void { echo "\n== $t ==\n"; }

titre("Étape 1");
echo "Premier : " . $notes[0] . "\n";
echo "Dernier : " . $notes[array_key_last($notes)] . "\n"; 
echo "Nombre de notes : " . count($notes) . "\n";

for ($i = 0; $i < count($notes); $i++) {
    echo "Note n°" . ($i + 1) . " : " . $notes[$i] . "\n";
}
foreach ($notes as $i => $note) {
    echo "Note n°" . ($i + 1) . " : $note\n";
}
foreach ($prenoms as $i => $prenom) {
    echo ($i + 1) . ". $prenom\n";
}


titre("Étape 2");
$notes[] = 16;                          
$autre = $notesInitiales;
array_push($autre, 16);                 
print_r($notes);

array_unshift($notes, 10);              
print_r($notes);

$derniere = array_pop($notes);          
$premiere = array_shift($notes);        
echo "Retirée (dernière) : $derniere | Retirée (première) : $premiere\n";

array_splice($notes, 2, 0, [13]);       
print_r($notes);

unset($notes[1]);                       
print_r($notes);
$notes = array_values($notes);          
print_r($notes);


titre("Étape 3");
$notes = $notesInitiales;
echo in_array(17, $notes) ? "17 existe\n" : "17 n'existe pas\n";

$pos = array_search(9, $notes);
if ($pos !== false) {                   
    echo "La note 9 est à l'indice $pos\n";
} else {
    echo "La note 9 n'existe pas\n";
}
echo in_array('Omar', $prenoms, true) ? "Omar est présent\n" : "Omar est absent\n";


titre("Étape 4");
$notes = $notesInitiales;
$somme   = array_sum($notes);
$moyenne = round($somme / count($notes), 2);
echo "Somme : $somme | Moyenne : $moyenne | Min : " . min($notes) . " | Max : " . max($notes) . "\n";

$nb = 0;
foreach ($notes as $n) {
    if ($n >= 10) { $nb++; }
}
$nb2 = count(array_filter($notes, fn($n) => $n >= 10));
echo "Admis (boucle) : $nb | Admis (array_filter) : $nb2\n";

$pourcentage = round($nb2 / count($notes) * 100, 2);
echo "Admis (>= 10) : $nb2 sur " . count($notes) . " ($pourcentage %)\n";

$copie = $notes;
sort($copie);
$n = count($copie);
$milieu = intdiv($n, 2);
$mediane = ($n % 2 === 0)
    ? ($copie[$milieu - 1] + $copie[$milieu]) / 2
    : $copie[$milieu];
echo "Médiane : $mediane\n";


titre("Étape 5");
$croissant = $notes;  sort($croissant);
$decroissant = $notes; rsort($decroissant);
echo "Croissant   : " . implode(', ', $croissant) . "\n";
echo "Décroissant : " . implode(', ', $decroissant) . "\n";
echo "Original    : " . implode(', ', $notes) . "\n";

$top3 = array_slice($decroissant, 0, 3);
echo "3 meilleures notes : " . implode(', ', $top3) . "\n";

$p = $prenoms;
sort($p);
echo "Alphabétique : " . implode(', ', $p) . "\n";
echo "Inversé      : " . implode(', ', array_reverse($p)) . "\n";


titre("Étape 6");
$bonus = array_map(fn($n) => min($n + 1, 20), $notes);
echo "Avec bonus : " . implode(', ', $bonus) . "\n";

$admis = array_values(array_filter($notes, fn($n) => $n >= 10));
echo "Admis : " . implode(', ', $admis) . "\n";

$total = array_reduce($notes, fn($cumul, $n) => $cumul + $n, 0);
echo "Total (reduce) : $total\n";

echo "Majuscules : " . implode(', ', array_map('strtoupper', $prenoms)) . "\n";

function mention(float $n): string {
    if ($n < 10)  return 'Ajourné';
    if ($n < 14)  return 'Passable';
    if ($n < 16)  return 'Assez bien';
    return 'Bien';
}
$mentions = array_map(fn($n) => "$n → " . mention($n), $notes);
echo implode("\n", $mentions) . "\n";


titre("Étape 7");
echo implode(', ', $prenoms) . "\n";

$langages = array_unique(explode(',', 'php,js,sql,php,html,js'));
echo implode(', ', $langages) . "\n";

$fusion = array_unique(array_merge(['php', 'sql'], ['js', 'sql']));
echo "Fusion dédoublonnée : " . implode(', ', $fusion) . "\n";

$a = ['php', 'js', 'sql'];
$b = ['js', 'html', 'sql'];
echo "Communs : " . implode(', ', array_intersect($a, $b)) . "\n";
echo "Seulement dans a : " . implode(', ', array_diff($a, $b)) . "\n";

$paquets = array_chunk(range(1, 10), 3);
foreach ($paquets as $paquet) {
    echo '[' . implode(',', $paquet) . '] ';
}
echo "\n";


titre("Étape 8");

function moyenne(array $notes): float {
    if (count($notes) === 0) return 0.0;            
    return round(array_sum($notes) / count($notes), 2);
}

function mediane(array $notes): float {
    $n = count($notes);
    if ($n === 0) return 0.0;
    sort($notes);                                
    $m = intdiv($n, 2);
    return $n % 2 === 0 ? ($notes[$m - 1] + $notes[$m]) / 2 : (float) $notes[$m];
}

function admis(array $notes, float $seuil = 10): array {
    return array_values(array_filter($notes, fn($n) => $n >= $seuil));
}

function meilleures(array $notes, int $n = 3): array {
    rsort($notes);
    return array_slice($notes, 0, $n);
}

function histogramme(array $notes): void {
    foreach ($notes as $note) {
        echo str_pad((string) $note, 3, ' ', STR_PAD_LEFT) . ' | ' . str_repeat('*', max(0, (int) $note)) . "\n";
    }
}

foreach ([$notesInitiales, []] as $jeu) {
    echo "--- Jeu : [" . implode(', ', $jeu) . "] ---\n";
    echo "Moyenne : " . moyenne($jeu) . "\n";
    echo "Médiane : " . mediane($jeu) . "\n";
    echo "Admis : " . implode(', ', admis($jeu)) . "\n";
    echo "Meilleures : " . implode(', ', meilleures($jeu)) . "\n";
    histogramme($jeu);
}