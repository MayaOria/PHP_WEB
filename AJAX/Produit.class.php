<?php
class Produit {

public string $nom;
public float $prix;

public function __construct(string $nom, float $prix)
{
    $this -> nom = $nom;
    $this -> prix = $prix;
}

public function getNom():string{

    return $this ->nom;
}
public function setNom():string{

    return $this ->nom;
}


}
?>