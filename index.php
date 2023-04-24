<h1>Banque<h1>

<?php
require 'classes/Titulaire.php';
require 'classes/Compte.php';

$titu1 = new Titulaire("AVON", "Victor", "2003-04-11", "Mulhouse");
$c1 = new Compte("Compte Courant", 200.58, "euros", $titu1);
$c2 = new Compte("Livret A", 2500, "euros", $titu1);
$c3 = new Compte("Compte Epargne", 10000, "euros", $titu1);

$titu2 = new Titulaire("Jonathan", "Cohen", "1980-06-16", "Paris");
$c4 = new Compte("Compte Courant", 1, "euros", $titu2);
$c5 = new Compte("Livret A", 10, "euros", $titu2);
$c6 = new Compte("Compte Epargne", 100, "euros", $titu2);

echo $titu1;
echo $titu1->afficherCompte();
$c1->creditCompte(100);
echo "<br>";
echo $titu1->afficherCompte();
$c1->debitCompte(201);
echo "<br>";
echo $titu1->afficherCompte();

echo $c1->virementTo($c2, 50);
echo "<br>";
echo $titu1->afficherCompte();

echo "<br>";
echo $titu2;
echo $titu2->afficherCompte();