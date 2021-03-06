<?php
    include "header.php";

    require("Planning.class.php");
    require("Calendrier.class.php");

    $maSession = 123;    // on suppose que l'ID session vaut 123

    $unPlanning = new Planning($maSession);
    $unCalendrier = new Calendrier($unPlanning);

    echo "<h1>Planning</h1>";

    //$unPlanning->afficheListeComplete();
/*
    $unPlanning->afficheListeEntreDeuxDates('2019-01-01', '2019-01-31');
    echo "<hr>";
*/
    echo "<h2>Cette semaine</h2>";
    $unPlanning->extraireCetteSemaine();

    echo "<h2>La semaine prochaine</h2>";
    $unPlanning->extraireSemaineProchaine();

/*    $unMois = $unPlanning->extraireCalendrier(6,2019);
    $unPlanning->extraireCalendrier(1,2019);
    $unPlanning->extraireCalendrier(12,2019);*/

    $unCalendrier->afficheMois(8, 2022, TRUE);    echo "<hr>";  // TRUE : on affiche uniquement les jours du mois
    $unCalendrier->afficheMois(9, 2022, FALSE);  echo "<hr>";  // FALSE : on affiche tous les jours
    $unCalendrier->afficheMois(10, 2022, TRUE);    echo "<hr>";
    $unCalendrier->afficheMois(5, 2022, FALSE);   echo "<hr>";
    $unCalendrier->afficheMois(11, 2023, FALSE);  echo "<hr>";

    $unCalendrier->afficheTousLesMois(TRUE);


    include_once "footer.php";
?>
