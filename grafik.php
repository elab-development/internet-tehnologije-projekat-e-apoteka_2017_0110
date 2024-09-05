<?php

require "init.php";
header("Content-type: application/json");

$array['cols'][] = array('label' => 'Kategorija','type' => 'string');
$array['cols'][] = array('label' => 'Broj komada', 'type' => 'number');

$sql="SELECT k.nazivKategorije as naziv, k. kategorijaID, count(l.lekID) AS ukupno FROM lekovi l JOIN kategorijalekova k ON (l.kategorijaID = k.kategorijaID)  GROUP BY kategorijaID";
$podaci = $db->rawQuery($sql);
foreach($podaci as $pod):
 $array['rows'][] = array('c' => array( array('v'=>(string)$pod["naziv"]),array('v'=>(double)$pod["ukupno"])) );
endforeach;


$niz_json = json_encode ($array);
print ($niz_json);

?>
