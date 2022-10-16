<?php

include "./Produit.class.php";

$p1 = new Produit ("bonbon", 1);
$p2 = new Produit ("Frites", 1.3);
$p3 = new Produit ("Frites", 1.3);

$arr = [$p1, $p2, $p3];

echo json_encode($arr);

?>